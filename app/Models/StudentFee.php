<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentFee extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="student_fees";
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
