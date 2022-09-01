<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\PrizeWinnersExport;
use Maatwebsite\Excel\Facades\Excel;


class PrizeWinnersExportController extends Controller
{
    public function export()
    {
        return Excel::download(new PrizeWinnersExport(), 'prize_winners.xlsx');
    }
}
