<?php

namespace App\Http\Controllers;

use App\Mail\SendFees;
use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StudentFee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        if ($user) {
        $role = $user->role_id;
        }
        if($role){
            if($role == 1){
                $student_fees = Student::select('*')
                ->withCount(['student_fees as total_fees_paid' => function ($query) {
                $query->select(DB::raw('COALESCE(SUM(amount), 0)'));
                }])
                ->get();
            }
            else{
                if($role == 2){
                    $staff = Staff::where('user_id',$user->id)->first();
                    $student_fees = Student::select('*')
                    ->withCount(['student_fees as total_fees_paid' => function ($query) {
                    $query->select(DB::raw('COALESCE(SUM(amount), 0)'));
                    }])->where('institution_id', $staff->institution_id)
                    ->get();
                }
                else{
                    $student_fees = Student::select('*')
                ->withCount(['student_fees as total_fees_paid' => function ($query) {
                $query->select(DB::raw('COALESCE(SUM(amount), 0)'));
                }])
                ->get();
                }

            }
        }

       // dd($student_fees);
      
        return view('fees.index',compact('student_fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'amount' => 'required|max:255',
            'student_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
            StudentFee::create([
                'student_id' => $request->student_id,
                'amount' => $request->amount
            ]);
        $mail = Mail::to('abcd@gmail.com')->send(new SendFees($request->amount));
        return redirect()->route('fees.index')->with('success', 'Fees Payment successfully!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
