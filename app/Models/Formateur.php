<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
