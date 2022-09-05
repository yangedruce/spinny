<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserCode;
use App\Http\Controllers\Controller;
use App\Exports\UsersCodeExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersCodeExportController extends Controller
{
    public function export()
    {
        $usercodes = UserCode::query()->get(['id', 'user_code', 'name', 'phone', 'email', 'validation']);
        return Excel::download(new UsersCodeExport($usercodes ?? []), 'users_code.xlsx');
    }
}
