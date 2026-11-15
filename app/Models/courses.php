<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{

     public function Lectures()
    {
        return $this->hasMany(Lectures::class);
    }

     public function User()
    {
        return $this->hasMany(User::class);
    }
}
