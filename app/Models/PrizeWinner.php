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
        'code_id',
        'prize_id',
    ];

    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }

    public function code()
    {
        return $this->belongsTo(Code::class);
    }
}
