<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GrandPrizeWinner;
use Illuminate\Http\Request;

class GrandPrizeWinnerController extends Controller
{
    public function index()
    {
        $grandprizewinners = GrandPrizeWinner::paginate(10);

        return view('admin.grand-prize-winner.index', ['grandprizewinners' => $grandprizewinners]);
    }
}
