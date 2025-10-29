<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('pages.teachers.index', compact('teachers'));
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('pages.teachers.show', compact('teacher'));
    }
}
