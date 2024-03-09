<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\Batch;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
        $courses  = Course::all();
        return view('student.view_students',compact('students','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $courses = Course::all();
        return view('student.add_student',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $student = new Student;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->address = $request->address;
        $student->mobile = $request->mobile;
        $student->email = $request->email;
        $student->qualification = $request->qualification;
       

        if($request->status == 0){
            if($student->save()){
                return redirect()->route('student.create')->with('status','Student Successfully Added');
            }
            else{
                return redirect()->route('student.create')->with('status','Operation failed');
            }
        }
        else{
          
                $aadharphoto = '';
                if ($aadhar = $request->file('aadhar_photo')){
                $aadharphoto = time().'-'.uniqid().'.'.$aadhar->getClientOriginalExtension();
                $aadhar->move('uploads/images/aadhar', $aadharphoto);
                }

                $studentphoto = '';
                if ($students = $request->file('student_photo')){
                $studentphoto = time().'-'.uniqid().'.'.$students->getClientOriginalExtension();
                $students->move('uploads/images/students', $studentphoto);
                }

                $sslcphoto = '';
                if ($sslc = $request->file('sslc_photo')){
                $sslcphoto = time().'-'.uniqid().'.'.$sslc->getClientOriginalExtension();
                $sslc->move('uploads/images/sslc', $sslcphoto);
                }

                $plustwophoto = '';
                if ($plustwo = $request->file('plustwo_photo')){
                $plustwophoto = time().'-'.uniqid().'.'.$plustwo->getClientOriginalExtension();
                $plustwo->move('uploads/images/plustwo', $plustwophoto);
                }

                $student->status = "enquiry";
                $student->aadhar_number = $request->aadhar_number;
                $student->aadhar_photo = $aadharphoto;
                $student->student_photo = $studentphoto;
                $student->sslc_certificate = $sslcphoto;
                $student->plustwo_certificate = $plustwophoto;

                $student->course_id = $request->course;
                $student->created_by = auth()->user()->id;

                if($student->save()){
                    return redirect()->route('student.create')->with('status','Student Successfully Added');
                }
                else{
                    return redirect()->route('student.create')->with('status','Operation failed');
                }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $courses = Course::all();
        $student = Student::find($id);
        return view('student.show_student',compact('courses','student'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function allocate($id){
        $student = Student::find($id);
        $batch = Batch::all();
        return view('student.allocate_batch',compact('student','batch'));
    }

    public function batched(Request $request , $id){
        
        $student = Student::find($id);
        $student->batch_id = $request->batch;
        $student->status = "allocated";
        if($student->update()){
            return redirect()->route('student.index')->with('status','Student Successfully Allocated');
        }
        else{
            return redirect()->route('student.index')->with('status','Operation failed');
        }
    }

    public function edit(string $id)
    {
        //
        $student = Student::find($id);
        $courses = Course::all();
        return view('student.edit_student',compact('courses','student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $student = Student::find($id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->address = $request->address;
        $student->mobile = $request->mobile;
        $student->email = $request->email;
        $student->qualification = $request->qualification;

        if($student->update()){
            return redirect()->route('student.index')->with('status','Student Successfully Updateds');
        }
        else{
            return redirect()->route('student.index')->with('status','Operation failed');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
