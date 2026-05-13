<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Students extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'name',
        'nim',
    ];

    public function student_scores(){
        return $this->hasMany(Scores::class, 'student_id');
    }

    public function getAverage() : float {
        if($this->relationLoaded('student_scores')) {
            $count = $this->scores->count();
            if($count == 0){
                return 0;
            }

            return round($this->student_scores->average('score'), 2);
        }

        return 0;
    }
}
