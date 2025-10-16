<?php

namespace App\Models;

use App\Models\SubjectAssignment;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $fillable = ['subject_assignment_id', 'day', 'start_time', 'end_time'];

    public function subjectAssignment()
    {
        return $this->belongsTo(SubjectAssignment::class);
    }
}
