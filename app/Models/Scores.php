<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    protected $table = 'scores';

    protected $fillable = [
        'student_id',
        'course_id',
        'score',
    ];

    public function student(){
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function course(){
        return $this->belongsTo(Courses::class, 'course_id');
    }
}
