<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
