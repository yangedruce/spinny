<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_code',
        'name',
        'phone',
        'email',
        'validation',
    ];

    public function prizewinners()
    {
        return $this->hasMany(PrizeWinner::class);
    }

    public function grandprizewinners()
    {
        return $this->hasMany(GrandPrizeWinner::class);
    }
}
