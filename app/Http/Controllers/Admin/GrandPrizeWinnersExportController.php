<?php

namespace App\Http\Controllers\Admin;

use App\Exports\GrandPrizeWinnersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class GrandPrizeWinnersExportController extends Controller
{
    public function export()
    {
        return Excel::download(new GrandPrizeWinnersExport(), 'grand_prize_winners.xlsx');
    }
}
