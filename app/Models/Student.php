<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'date_of_birth', 'gender', 'age', 'user_id', 'image'];
    protected $hidden = ['name'];

    /**
     * Get the user that owns the student.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeMale($query)
    {
        return $query->where('gender', 'male')
        ->where('age', '>', 25); 
    }

    public function scopeFemale($query)
    {
        return $query->where('gender', 'female')
        ->where('age', '>', 25);    
    }
}
