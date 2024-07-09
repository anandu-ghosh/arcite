<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="courses";
    protected $guarded = [];

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
