<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    //     'day',
    //     'time_start',
    //     'time_end',
    //     'time_limit',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subjects');
    }
}