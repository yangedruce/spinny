<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prize;
use App\Exports\PrizesExport;
use Maatwebsite\Excel\Facades\Excel;

class PrizesExportController extends Controller
{
    public function export()
    {
        $prizes = Prize::query()->get([
            'id',
            'code',
            'name',
            'total_count',
            'remaining']);
        return Excel::download(new PrizesExport($prizes ?? []), 'prizes.xlsx');
    }
}
