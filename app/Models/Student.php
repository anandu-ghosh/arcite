<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="students";
    protected $guarded = [];
   
    public function student_fees()
    {
        return $this->hasMany(StudentFee::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function getCoursesAttribute($value)
    {
        return unserialize($value);
    }
    public function courseNames()
    {
        return Course::whereIn('id', $this->courses)->pluck('name');
    }
}
