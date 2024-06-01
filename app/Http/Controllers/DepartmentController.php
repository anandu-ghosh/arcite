<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::all();
        $institutions = Institution::all();
        return view('departments.list',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $institutions = Institution::all();
        return view('departments.add',compact('institutions'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'institution' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            Department::create([
                'name' => $request->name,
                'institution_id' => $request->institution
            ]);
            return redirect()->route('department.index')->with('success', 'Department inserted successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $department = Department::find($id);
        return view('departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $department = Department::find($id);
        $institutions = Institution::all();
        return view('departments.edit',compact('department','institutions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'institution' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            $department = Department::find($id);
            $department->update([
                'name' => $request->name,
                'institution_id' => $request->institution
            ]);
            return redirect()->route('department.index')->with('success', 'Department Updated successfully!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $department = Department::find($id);
        if($department->delete()){
            return redirect()->route('department.index')->with('success', 'Department Deleted successfully!');
        }
        else{
            return redirect()->route('department.index')->with('error', 'Failed!');
        }
    }

    public function departments(Request $request){

        $institutionId = $request->input('institution_id');
        $departments = Department::where('institution_id',$institutionId  )->get();
        return response()->json($departments);
    }
}
