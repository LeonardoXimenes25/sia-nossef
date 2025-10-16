<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\SubjectAssignment;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['nrp', 'name'];
    
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function subjectAssignments()
    {
        return $this->hasMany(SubjectAssignment::class);
    }
}
