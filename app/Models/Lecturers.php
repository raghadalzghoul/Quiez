<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Lecturers extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


     public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function courses()
    {
        return $this->hasMany(courses::class);
    }

}
