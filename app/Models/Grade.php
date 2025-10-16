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

    /**
     * Relasi ke murid
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Relasi ke SubjectAssignment
     * (menghubungkan guru, mata pelajaran, kelas, dan jurusan)
     */
    public function subjectAssignment()
    {
        return $this->belongsTo(SubjectAssignment::class);
    }

    /**
     * Relasi ke Tahun Ajaran (contoh: 2024/2025)
     */
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    /**
     * Relasi ke Periode (contoh: Primeiru, Segundu, Terseru)
     */
    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    /**
     * Akses cepat ke guru (melalui subjectAssignment)
     */
    public function teacher()
    {
        return $this->hasOneThrough(
            Teacher::class,
            SubjectAssignment::class,
            'id',           // Foreign key di SubjectAssignment
            'id',           // Foreign key di Teacher
            'subject_assignment_id', // Local key di Grade
            'teacher_id'    // Local key di SubjectAssignment
        );
    }

    /**
     * Akses cepat ke mata pelajaran (melalui subjectAssignment)
     */
    public function subject()
    {
        return $this->hasOneThrough(
            Subject::class,
            SubjectAssignment::class,
            'id',
            'id',
            'subject_assignment_id',
            'subject_id'
        );
    }
}
