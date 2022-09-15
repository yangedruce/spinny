<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrizeWinner extends Model
{
    use HasFactory;

    protected $fillable = [
        'shared',
        'spin_code_id',
        'prize_id',
    ];

    public function prize()
    {
        return $this->belongsTo(Prize::class, 'prize_id', 'id');
    }

    public function spinCode()
    {
        return $this->belongsTo(SpinCode::class, 'spin_code_id', 'id');
    }
}
