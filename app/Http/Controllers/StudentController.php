<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\Batch;
use App\Models\Department;
use Illuminate\Support\Facades\File;

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
        $departments = Department::all();
        $uniqueDepartments = $departments->unique('name');
        return view('student.add_student',compact('courses','uniqueDepartments'));
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

    public function batched(Request $request){
        
        $student = Student::find($request->student);
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
        $student->updated_by = auth()->user()->id;
        if($request->status == 0){
            $student->status = "visit";
            if($student->update()){
                return redirect()->route('student.index')->with('status','Student Successfully Updated');
            }
            else{
                return redirect()->route('student.index')->with('error','Operation failed');
            }
        }
        else{
            $student->status = "enquiry";
            $student->aadhar_number = $request->aadhar_number;

            if ($aadhar = $request->file('aadhar_photo')){
                $adhar_destination = "uploads/images/aadhar/".$student->aadhar_photo;
                if(File::exists($adhar_destination)){
                    File::delete($adhar_destination);
                }
                
                $aadharphoto = time().'-'.uniqid().'.'.$aadhar->getClientOriginalExtension();
                $aadhar->move('uploads/images/aadhar', $aadharphoto);
                }

            if ($students = $request->file('student_photo')){
                $photo_destination = "uploads/images/students/".$student->student_photo;
                if(File::exists($photo_destination)){
                    File::delete($photo_destination);
                }
                $studentphoto = time().'-'.uniqid().'.'.$students->getClientOriginalExtension();
                $students->move('uploads/images/students', $studentphoto);
                }

            if ($sslc = $request->file('sslc_photo')){
                $sslc_destination = "uploads/images/sslc/".$student->sslc_certificate;
                if(File::exists($sslc_destination)){
                    File::delete($sslc_destination);
                }
                $sslcphoto = time().'-'.uniqid().'.'.$sslc->getClientOriginalExtension();
                $sslc->move('uploads/images/sslc', $sslcphoto);
                }

            if ($plustwo = $request->file('plustwo_photo')){
                $plustwo_destination = "uploads/images/plustwo/".$student->plustwo_certificate;
                if(File::exists($plustwo_destination)){
                    File::delete($plustwo_destination);
                }
                $plustwophoto = time().'-'.uniqid().'.'.$plustwo->getClientOriginalExtension();
                $plustwo->move('uploads/images/plustwo', $plustwophoto);
                }
            
                if(isset($aadharphoto)){
                    $student->aadhar_photo = $aadharphoto;
                }
                if(isset($studentphoto)){
                    $student->student_photo = $studentphoto;
                }
                if(isset($sslcphoto)){
                    $student->sslc_certificate = $sslcphoto; 
                }
                if(isset($plustwophoto)){
                    $student->plustwo_certificate = $plustwophoto;
                }
                
                $student->course_id = $request->course;
                if($student->update()){
                    return redirect()->route('student.index')->with('status','Student Successfully Updated');
                }
                else{
                    return redirect()->route('student.index')->with('error','Operation failed');
                }
            
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::find($id);
        if($student->delete()){
            return redirect()->back()->with('status','Student Successfully Deleted');
        }
        else{
            return redirect()->back()->with('status','Student Cant Deleted');
        }
    }

    public function findBatch(Request $request){
        $batches = Batch::where('course_id',$request->course_id)->get();
        return $batches;
    }
}
