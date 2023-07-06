<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'career_id',
        'user_id',
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_subjects');
    }

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }

    public function subjectSettings(): HasMany
    {
        return $this->hasMany(SubjectSettings::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assistence(): HasMany
    {
        return $this->hasMany(Assistence::class);
    }
}
