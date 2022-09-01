<?php

namespace App\Http\Controllers\Admin;

use App\Exports\GrandPrizeWinnersExport;
use App\Http\Controllers\Controller;
use App\Models\GrandPrizeWinner;
use Maatwebsite\Excel\Facades\Excel;

class GrandPrizeWinnersExportController extends Controller
{
    public function export()
    {
        $grandprizewinners = GrandPrizeWinner::query()->get(['id', 'code_id', 'email', 'month']);
        return Excel::download(new GrandPrizeWinnersExport($grandprizewinners ?? []), 'grand_prize_winners.xlsx');
    }
}
