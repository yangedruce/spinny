<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpinCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'validation',
    ];

    public function prizeWinners()
    {
        return $this->hasMany(PrizeWinner::class);
    }

    public function grandPrizeWinners()
    {
        return $this->hasMany(GrandPrizeWinner::class);
    }
}
