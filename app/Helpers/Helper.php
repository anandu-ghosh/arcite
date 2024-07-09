<?php

namespace App\Helpers;
use DB;
use Auth;

class Helper
{
    public static function lastActivity()
    {
        return session()->get('activity_time');
    }

    public static function roles()
    {
       return DB::table('roles')->where('status','active')->whereNotIn('id', [1, 10])->get();
    }

    public static function totalStudents(){
        $user = Auth::user()['role_id'];
        
        if($user == 1){
            return DB::table('students')->count();
        }else{
            $office_id = DB::table('staffs')->where('user_id',Auth::user()['id'])->value('institution_id');
            return DB::table('students')->where('institution_id',$office_id)->count();
        }
        
    }

    public static function totalfee()
    {
        $user = Auth::user()['role_id'];
        
        if($user == 1){
            return DB::table('student_fees')
            ->whereDate('created_at', Carbon::today())
            ->sum('amount');
        }else{
            $office_id = DB::table('staffs')->where('user_id',Auth::user()['id'])->value('institution_id');
            return DB::table('students')->join('student_fees', 'students.id', '=', 'student_fees.student_id')->where('students.institution_id',$office_id)->whereDate('student_fees.created_at', Carbon::today())->sum('student_fees.fee_amount');
        }
    }
}