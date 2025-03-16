<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAssigment extends Model
{
    protected $fillable = [
        'teacher_id',
        'subject_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
