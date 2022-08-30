<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasFactory;

    protected $fillable = [
        'prize_code',
        'prize_name',
        'total_count',
        'remaining',
    ];

    public function prizewinners()
    {
        return $this->hasMany(PrizeWinner::class);
    }
}
