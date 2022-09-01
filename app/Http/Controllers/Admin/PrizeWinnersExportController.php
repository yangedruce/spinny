<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\PrizeWinnersExport;
use App\Models\PrizeWinner;
use Maatwebsite\Excel\Facades\Excel;


class PrizeWinnersExportController extends Controller
{
    public function export()
    {
        $prizewinners = PrizeWinner::query()->get(['id', 'code_id', 'prize_id', 'email', 'shared']);
        return Excel::download(new PrizeWinnersExport($prizewinners ?? []), 'prize_winners.xlsx');
    }
}
