<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $departments = Department::all();
        return view('course.add_course',compact('institutions','departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

            $validator = Validator::make($request->all(), [
            'institution' => 'required|max:255',
            'department' => 'required|max:255',
            'name' => 'required|max:255',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            Course::create([
                'name' => $request->name,
                'institution_id' => $request->institution,
                'department_id' => $request->department,
                'status' => 1,
                'created_by' => auth()->user()->id
                
            ]);
            return redirect()->route('course.index')->with('success', 'Course inserted successfully!');
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
        $departments = Department::all();
        return view('course.show_course',compact('course','institutions','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $course = Course::find($id);
        $institutions = Institution::all();
        $departments = Department::where('institution_id',$course->institution_id)->get();
        return view('course.edit_course',compact('course','institutions','departments'));
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
        $course->department_id = $request->department;
        $course->status = 1;
        $course->updated_by = auth()->user()->id;
        if($course->update()){
            return redirect()->route('course.index')->with('success','Course Successfully Updated');
        }
        else{
            return redirect()->route('course.index')->with('error','failed');
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

    public function courses(Request $request){
        $institutionId = $request->input('institution_id');
        $departmentId = $request->input('department_id');
        // $courses = Course::where('institution_id',$institutionId)
        //                       ->where('department_id',$departmentId)
        //                       ->get();
        $coursesQuery = Course::query();   
        if ($institutionId) {
            $coursesQuery->where('institution_id', $institutionId);          
        }
        if ($departmentId) {
            $coursesQuery->where('department_id', $departmentId);
        }
        $courses = $coursesQuery->get();
        return response()->json($courses);
    }
}
