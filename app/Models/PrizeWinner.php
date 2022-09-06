<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrizeWinner extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'shared',
        'user_code_id',
        'prize_id',
    ];

    public function prize()
    {
        return $this->belongsTo(Prize::class, 'prize_id', 'id');
    }

    public function usercode()
    {
        return $this->belongsTo(UserCode::class, 'user_code_id', 'id');
    }
}
