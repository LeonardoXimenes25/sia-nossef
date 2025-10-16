<?php

namespace App\Models;

use App\Models\Major;
use App\Models\Period;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassRoom;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;

class SubjectAssignment extends Model
{
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'academic_year_id',
        'period_id',
        'class_room_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function timetables()
    {
    return $this->hasMany(Timetable::class);
    }

}
