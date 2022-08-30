<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_code',
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
