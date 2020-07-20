<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;

class electiveSimilarity extends Model
{
    protected $courses       = [];
    protected $featureWeight  = 1;
    protected $session_idWeight    = 1;
    protected $facultyWeight = 1;
    protected $session_idHighRange = 1000;

    public function __construct(array $courses)
    {
        $this->courses       = $courses;
        $this->session_idHighRange = max(array_column($courses, 'session_id'));
    }

    public function setFeatureWeight(float $weight): void
    {
        $this->featureWeight = $weight;
    }

    public function setSession_idWeight(float $weight): void
    {
        $this->session_idWeight = $weight;
    }

    public function setFacultyWeight(float $weight): void
    {
        $this->facultyWeight = $weight;
    }

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        foreach ($this->courses as $course) {

            $similarityScores = [];

            foreach ($this->courses as $_course) {
                if ($course->id === $_course->id) {
                    continue;
                }
                $similarityScores['course_id_' . $_course->id] = $this->calculateSimilarityScore($course, $_course);
            }
            $matrix['course_id_' . $course->id] = $similarityScores;
        }
        return $matrix;
    }

    public function getCoursesSortedBySimularity(int $courseId, array $matrix): array
    {
        $similarities   = $matrix['course_id_' . $courseId] ?? null;
        $sortedCourses = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find course with that ID.');
        }
        arsort($similarities);

        foreach ($similarities as $courseIdKey => $similarity) {
            $id      = intval(str_replace('course_id_', '', $courseIdKey));
            $courses = array_filter($this->courses, function ($course) use ($id) { return $course->id === $id; });
            if (! count($courses)) {
                continue;
            }
            $course = $courses[array_keys($courses)[0]];
            $course->similarity = $similarity;
            $sortedCourses[] = $course;
        }
        return $sortedCourses;
    }

    protected function calculateSimilarityScore($courseA, $courseB)
    {
        $courseAFeatures = implode('', get_object_vars($courseA->features));
        $courseBFeatures = implode('', get_object_vars($courseB->features));

        return array_sum([
            (Similarity::hamming($courseAFeatures, $courseBFeatures) * $this->featureWeight),
            (Similarity::euclidean(
                Similarity::minMaxNorm([$courseA->session_id], 0, $this->session_idHighRange),
                Similarity::minMaxNorm([$courseB->session_id], 0, $this->session_idHighRange)
            ) * $this->session_idWeight),
            (Similarity::jaccard($courseA->faculty, $courseB->faculty) * $this->facultyWeight)
        ]) / ($this->featureWeight + $this->session_idWeight + $this->facultyWeight);
    }
}
