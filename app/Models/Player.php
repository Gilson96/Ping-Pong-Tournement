<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name'
    ];

    // hasMany relantionship funcion
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
