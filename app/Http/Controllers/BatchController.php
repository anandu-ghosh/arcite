<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::all();
        $batches = Batch::all();
        return view('batch.view_batches',compact('batches','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $courses = Course::all();
        return view('batch.add_batch',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'whattsapp_link' => 'required'
        ]);
        $batch = new Batch;
        $batch->course_id = $request->course;
        $batch->name = $request->name;
        $batch->whattsapp_link = $request->whattsapp_link;
        $batch->created_by = auth()->user()->id;
        if($batch->save()){
            return redirect()->route('batch.index')->with('status','Batch Successfully Added');
        }
        else{
            return redirect()->route('batch.index')->with('status','Failed');
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
        return view('batch.edit_batch',compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $batch = Batch::find($id);
        $batch->name = $request->name;
        $batch->whattsapp_link = $request->whattsapp_link;
        $batch->updated_by = auth()->user()->id;
        if($batch->update()){
            return redirect()->route('batch.index')->with('status','Batch Successfully Updated');
        }
        else{
            return redirect()->route('batch.index')->with('status','Failed');
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
            return redirect()->route('batch.index')->with('status','Batch Successfully Deleted');
        }
        else{
            return redirect()->route('batch.index')->with('status','Failed');
        }
    }
}
