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
            'classRoom.major', // ambil kelas dan jurusan
        ])->orderBy('day')->orderBy('start_time')->get();

        // Ambil daftar kelas unik
        $classes = $timetables
            ->pluck('classRoom.level')
            ->filter()
            ->unique()
            ->values();

        // Ambil daftar turma unik
        $turmas = $timetables
            ->pluck('classRoom.turma')
            ->filter()
            ->unique()
            ->values();

        // Ambil daftar guru unik
        $teachers = $timetables
            ->pluck('subjectAssignment.teacher.name')
            ->filter()
            ->unique()
            ->values();

        // Ambil daftar jurusan unik
        $majors = $timetables
            ->pluck('classRoom.major.name')
            ->filter()
            ->unique()
            ->values();

        return view('pages.schedule', compact('timetables', 'classes', 'turmas', 'teachers', 'majors'));
    }
}
