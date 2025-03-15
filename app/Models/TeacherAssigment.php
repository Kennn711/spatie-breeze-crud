<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAssigment extends Model
{
    protected $fillable = [
        'teacher_id',
        'subject_id',
    ];
}
