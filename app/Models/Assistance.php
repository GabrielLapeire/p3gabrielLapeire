<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Assistance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'student_id',
        'subject_id',
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function subjects(): BelongsTo
    {
        return $this->belongsTo(Subject::class,);
    }
}
