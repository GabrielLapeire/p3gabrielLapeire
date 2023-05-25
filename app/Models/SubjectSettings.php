<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'day',
        'time_start',
        'time_end',
        'time_limit',
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

}
