<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_assignment_id',
        'academic_year_id',
        'period_id',
        'score',
    ];

    // Relasi ke Murid
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relasi ke SubjectAssignment (Guru, Mata Pelajaran, Kelas, Jurusan)
    public function subjectAssignment()
    {
        return $this->belongsTo(SubjectAssignment::class);
    }

    // Relasi ke Tahun Ajaran
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    // Relasi ke Periode
    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    /**
     * Akses cepat ke Guru melalui SubjectAssignment
     */
    public function teacher()
    {
        return $this->subjectAssignment?->teacher;
    }

    /**
     * Akses cepat ke Mata Pelajaran melalui SubjectAssignment
     */
    public function subject()
    {
        return $this->subjectAssignment?->subject;
    }

    /**
     * Akses cepat ke Kelas melalui SubjectAssignment
     */
    public function classRoom()
    {
        return $this->subjectAssignment?->classRoom;
    }
}
