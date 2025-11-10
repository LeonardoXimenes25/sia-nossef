<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        // Ambil semua siswa
        $students = Student::with(['classRoom', 'major'])->get();

        // Ambil tahun ajaran aktif (misal yang terakhir)
        $academicYear = AcademicYear::latest()->first(); 

        return view('pages.students.index', compact('students', 'academicYear'));
    }
}
