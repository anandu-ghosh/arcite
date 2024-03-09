<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Institution;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view('course.view_courses',compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        $institutions = Institution::all();
        return view('course.add_course',compact('institutions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $course = new Course;
        $course->institution_id = $request->institution;
        $course->name = $request->name;
        $course->status = 1;
        $course->created_by = auth()->user()->id;
        if($course->save()){
            return redirect()->route('course.create')->with('status','Course Successfully Added');
        }
        else{
            return redirect()->route('course.create')->with('status','failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $course = Course::find($id);
        $institutions = Institution::all();
        return view('course.show_course',compact('course','institutions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $course = Course::find($id);
        $institutions = Institution::all();
        return view('course.edit_course',compact('course','institutions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $course = Course::find($id);
        $course->name = $request->name;
        $course->institution_id = $request->institution;
        $course->status = 1;
        $course->updated_by = auth()->user()->id;
        if($course->update()){
            return redirect()->route('course.index')->with('status','Course Successfully Updated');
        }
        else{
            return redirect()->route('course.index')->with('status','failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $course = Course::find($id);
        if($course->delete()){
            return redirect()->back()->with('status','Course Successfully Deleted');
        }
        else{
            return redirect()->back()->with('status','Failed to Delete');
        }
    }
}
