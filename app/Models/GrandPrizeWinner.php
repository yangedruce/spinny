<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrandPrizeWinner extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'month',
        'user_code_id',
    ];

    public function usercode()
    {
        return $this->belongsTo(UserCode::class, 'user_code_id', 'id');
    }
}
