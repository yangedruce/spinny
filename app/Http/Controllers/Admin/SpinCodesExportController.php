<?php

namespace App\Http\Controllers\Admin;

use App\Models\SpinCode;
use App\Http\Controllers\Controller;
use App\Exports\SpinCodesExport;
use Maatwebsite\Excel\Facades\Excel;

class SpinCodesExportController extends Controller
{
    public function export()
    {
        $spinCodes = SpinCode::query()->get([
            'id',
            'code',
            'validation']);
        return Excel::download(new SpinCodesExport($spinCodes ?? []), 'spin_code.xlsx');
    }
}
