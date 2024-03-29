<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $staffs = Staff::all();
        $institutions = Institution::all();
        return view('staff.view_staff',compact('staffs','institutions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $institutions = Institution::all();
        return view('staff.add_staff',compact('institutions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'institution' =>'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->role_id = 2;
        $user->email = $request->email;
        $password = "";
        $password = $request->name.substr($request->mobile , -5);
        $user->password = bcrypt($password);
        $user->email_verified_at = now();
       
        if($user->save()){
            $staff = new Staff;
            $staff->user_id = $user->id;
            $staff->institution_id = $request->institution;
            $staff->name = $request->name;
            $staff->address = $request->address;
            $staff->email = $request->email;
            $staff->phone = $request->mobile;
            $staff->status = 1;
            $staff->created_by = auth()->user()->id;
            if($staff->save()){
                return redirect()->route('staff.create')->with('status','Staff Successfully Added');
            }
            else{
                return redirect()->route('staff.create')->with('status','Staff cant add');
            }
        }
        else{
            return redirect()->route('staff.create')->with('status','Staff cant add');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $staff = Staff::find($id);
        $institutions = Institution::all();
        return view('staff.show_staff',compact('staff','institutions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $staff = Staff::find($id);
        $institutions = Institution::all();
        return view('staff.edit_staff',compact('staff','institutions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $staff = Staff::find($id);
        $staff->institution_id = $request->institution;
        $staff->name = $request->name;
        $staff->address = $request->address;
        $staff->email = $request->email;
        $staff->phone = $request->mobile;
        $staff->updated_by = auth()->user()->id;
        if($staff->update()){
            $user = User::find($request->user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            if($user->update()){
                return redirect()->route('staff.index')->with('status','Staff Successfully Updated');
            }
            else{
                return redirect()->route('staff.index')->with('status','Staff Cant update');
            }
        }
        else{
            return redirect()->route('staff.index')->with('status','Staff Cant update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $staff = Staff::find($id);
        if($staff->delete()){
            return redirect()->back()->with('status','Staff Successfully Deleted');
        }
        else{
            return redirect()->back()->with('status','Staff Cant Deleted');
        }
    }
}
