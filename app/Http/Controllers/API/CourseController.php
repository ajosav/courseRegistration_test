<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Session;
use App\Part;

class CourseController extends Controller
{
    
    public function __construct() {
        // $this->authorize("isAdmin");
        $this->middleware('auth:api');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Course::with('part', 'option', 'session', 'group')->latest()->paginate(10);
        $courses = Course::latest()->paginate(10);
        $courses->load(['option', 'part', 'session', 'group']);
        return response()->json($courses);
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
        $this->validate($request, [
            'course_code' => ['required', 'string', 'unique:courses'],
            'course_title' => ['required', 'string', 'max:150'],
            'unit' => ['required', 'integer'],
            'group_id' => ['required', 'integer'],
            'part_id' => ['required', 'integer'],
            'session_id' => ['required', 'integer']
        ]);

        Course::create([
            'course_code' => $request['course_code'],
            'course_title' => $request['course_title'],
            'prerequisite' => $request['prerequisite'],
            'unit' => $request['unit'],
            'group_id' => $request['group_id'],
            'option_id' => $request['option_id'],
            'part_id' => $request['part_id'],
            'session_id' => $request['session_id'],
            'description' => $request['description']
        ]);
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
        $course = Course::find($id);
        $this->validate($request, [
            'course_code' => 'required|string|unique:courses,course_code,'.$course->id,
            'course_title' => ['required', 'string', 'max:100'],
            'unit' => ['required', 'integer'],
            'group_id' => ['required', 'integer'],
            'option_id' => ['required', 'integer'],
            'part_id' => ['required', 'integer'],
            'session_id' => ['required', 'integer'],
        ]);

        $course->update($request->all());
        return ['Success', "Updated Successfuly"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the user
        $course = Course::findOrFail($id);
        $course->delete();

        // Delete the user
        return ['message' => 'Course deleted'];
    }

    public function messages() {
        return [
            'course_code.unique' => 'Course Already Exist',
        ];
    }

}
