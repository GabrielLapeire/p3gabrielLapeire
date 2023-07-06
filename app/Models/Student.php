<?php
/* php artisan make:model Student*/ 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'dni',
        'birthday',
        'status',
    ];

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'student_subjects');
    }

    public function assistence(): HasMany
    {
        return $this->hasMany(Assistence::class);
    }
}
