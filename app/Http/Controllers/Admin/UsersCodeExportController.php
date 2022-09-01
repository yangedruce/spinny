<?php

namespace App\Http\Controllers\Admin;

use App\Models\Code;
use App\Http\Controllers\Controller;
use App\Exports\UsersCodeExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersCodeExportController extends Controller
{
    public function export()
    {
        $codes = Code::query()->get(['id', 'user_code', 'name', 'phone', 'email', 'validation']);
        return Excel::download(new UsersCodeExport($codes ?? []), 'users_code.xlsx');
    }
}
