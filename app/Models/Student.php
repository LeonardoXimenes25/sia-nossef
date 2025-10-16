<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Major;
use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nre', 'name', 'class_room_id', 'major_id'];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
