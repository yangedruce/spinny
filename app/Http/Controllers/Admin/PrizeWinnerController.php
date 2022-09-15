<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrizeWinner;
use Illuminate\Http\Request;

class PrizeWinnerController extends Controller
{
    public function index()
    {
        $prizewinners = PrizeWinner::paginate(10);

        return view('admin.prize-winner.index', ['prizewinners' => $prizewinners]);
    }
}
