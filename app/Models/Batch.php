<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="batches";

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
