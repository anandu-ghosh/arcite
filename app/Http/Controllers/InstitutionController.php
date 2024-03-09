<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index()
    {
        $institutions = Institution::all();
        return view("institution.index",compact('institutions'));
    }
}
