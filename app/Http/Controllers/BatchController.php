<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use App\Models\Department;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::all();
       // $batches = Batch::all();
       $batches = DB::select('
       SELECT batches.*, courses.name AS course_name, departments.name AS department_name, institution.name AS institution_name
       FROM batches
       INNER JOIN courses ON batches.course_id = courses.id
       INNER JOIN departments ON courses.department_id = departments.id
       INNER JOIN institution ON departments.institution_id = institution.id
   ');
       
        return view('batch.view_batches',compact('batches','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $institutions = Institution::all();
        return view('batch.add_batch',compact('institutions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'institution' => 'required',
            'department' => 'required',
            'course' => 'required',
            'whattsapp_link' => 'required'
        ]);
        $batch = new Batch;
        $batch->institution_id  = $request->institution;
        $batch->department_id  = $request->department;
        $batch->course_id = $request->course;
        $batch->name = $request->name;
        $batch->whattsapp_link = $request->whattsapp_link;
        $batch->created_by = auth()->user()->id;
        if($batch->save()){
            return redirect()->route('batch.index')->with('success','Batch Successfully Added');
        }
        else{
            return redirect()->route('batch.index')->with('error','Failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $batch = Batch::find($id);
        return view('batch.show_batch',compact('batch')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $batch = Batch::find($id);
        $institutions = Institution::all();
        $departments = Department::where('institution_id',$batch->institution_id)->get();
        $courses = Course::where('institution_id',$batch->institution_id)
                           ->where('department_id',$batch->department_id)->get();
        return view('batch.edit_batch',compact('batch','institutions','departments','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $batch = Batch::find($id);
        $batch->institution_id = $request->institution;
        $batch->department_id = $request->department;
        $batch->course_id = $request->course;
        $batch->name = $request->name;
        $batch->whattsapp_link = $request->whattsapp_link;
        $batch->updated_by = auth()->user()->id;
        if($batch->update()){
            return redirect()->route('batch.index')->with('success','Batch Successfully Updated');
        }
        else{
            return redirect()->route('batch.index')->with('error','Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $batch = Batch::find($id);
        if($batch->delete()){
            return redirect()->route('batch.index')->with('success','Batch Successfully Deleted');
        }
        else{
            return redirect()->route('batch.index')->with('error','Failed');
        }
    }
}
