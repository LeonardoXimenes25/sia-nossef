<?php

namespace App\Models;

use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'code',
        'name',
        'major_id',
        'teacher_id',
    ];

    public function major() {
        return $this->belongsTo(Major::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
