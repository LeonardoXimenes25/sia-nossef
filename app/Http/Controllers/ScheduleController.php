<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $timetables = Timetable::with([
            'subjectAssignment.teacher',
            'subjectAssignment.subject',
            'subjectAssignment.classRoom',
            'subjectAssignment.classRoom.major',
        ])->orderBy('day')->orderBy('start_time')->get();

        // Ambil daftar kelas unik
        $classes = $timetables
            ->pluck('subjectAssignment.classRoom.level')
            ->filter()
            ->unique()
            ->values();

        // Ambil daftar guru unik
        $teachers = $timetables
            ->pluck('subjectAssignment.teacher.name')
            ->filter()
            ->unique()
            ->values();

        // Ambil daftar jurusan unik (IPA, IPS, dll)
        $majors = $timetables
            ->pluck('subjectAssignment.classRoom.major.name')
            ->filter()
            ->unique()
            ->values();

        return view('pages.schedule', compact('timetables', 'classes', 'teachers', 'majors'));
    }
}
