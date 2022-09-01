<?php

namespace App\Exports;

use App\Models\GrandPrizeWinner;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GrandPrizeWinnersExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('admin.grand-prize-winner.export.table', [
            'grandprizewinners' => GrandPrizeWinner::all()
        ]);
    }
}
