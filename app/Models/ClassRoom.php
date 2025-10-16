<?php

namespace App\Models;

use App\Models\Major;
use App\Models\Student;
use App\Models\SubjectAssignment;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = ['level', 'major_id', 'turma'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function subjectAssignments()
    {
        return $this->hasMany(SubjectAssignment::class);
    }
}
