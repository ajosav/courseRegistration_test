<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Session;
use App\Part;
use App\Course;
use Illuminate\Support\Facades\Auth;
use App\electiveSimilarity;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $session = Session::pluck('semester', 'id')->all();
        $level = Part::pluck('level', 'id')->all();
        return view('recommendation.index', compact('session', 'level'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function findCourses(Request $request) {
        $this->validate($request, [
            'semester' => ['required', 'integer'],
            'level' => ['required', 'integer', 'max:50']
        ]);
        // $courses = Course::find('session_id', (int)$request->semester)->where('part_id', (int)$request->level);
        $coreCourses = DB::select('select * from courses where session_id = ? AND part_id = ? AND group_id <> ?', [$request->semester, $request->level, 2]);
        $restrictedElectives = DB::select('select * from courses where session_id = ? AND part_id = ? AND group_id = ? ORDER BY reg_count DESC', [$request->semester, $request->level, 2]);
        $sn  = 1;
        $user_option = Auth::user()->option_id;
        $interpolate = null;
        if( $user_option == 2 || $user_option == 3) {
            $interpolate = 5;
        }

        // restricted electives comes in here
        $courses         = json_decode(file_get_contents(storage_path('data/electives-data.json')));
        $selectedId      = intval(app('request')->input('id') ?? '3');
        $elective        = DB::table('electives')->max('reg_count');
        $selectedCourse  = DB::table('electives')->where('reg_count', '=', $elective)->first();
        $selectedCourses = array_filter($courses, function ($course) use ($selectedId) { return $course->id === $selectedId; });
        if (count($selectedCourses)) {
            $selectedcourse = $selectedCourses[array_keys($selectedCourses)[0]];
        }

        $courseSimilarity = new electiveSimilarity($courses);
        $similarityMatrix  = $courseSimilarity->calculateSimilarityMatrix();
        $courses          = $courseSimilarity->getcoursesSortedBySimularity($selectedId, $similarityMatrix);
        $semester         = $request->semester;
        $level            = $request->level;
        // return view('courserec', compact('selectedId', 'selectedCourse', 'courses', 'semester'));




        // return $courses;
        return view('recommendation.course_registration', compact('coreCourses', 'sn', 'interpolate', 'restrictedElectives', 'selectedCourse', 'semester', 'courses', 'level'));
    }
}
