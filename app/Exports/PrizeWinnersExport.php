<?php

namespace App\Exports;

use App\Models\PrizeWinner;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PrizeWinnersExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('admin.prize-winner.export.table', [
            'prizewinners' => PrizeWinner::all()
        ]);
    }
}
