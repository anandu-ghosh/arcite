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
}
