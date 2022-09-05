<?php

namespace App\Http\Controllers\Admin;

use App\Imports\UsersCodeImport;
use App\Models\UserCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersCodeImportController extends Controller
{
    public function show()
    {
        return view('admin.usercode.import.show');
    }

    public function store(Request $request)
    {
        $file = $request->file('import_file');

        $extension = $file->extension();

        if ($extension == 'xlsx' || $extension == 'xls') {
            // remove all row
            $usercodes = UserCode::all();

            if (count($usercodes) > 0) {
                UserCode::query()->delete();
            }

            Excel::import(new UsersCodeImport(), $file);

            $request->session()->flash('status', 'File imported successfully.');
            return redirect()->route('admin.usercode.index');
        } else {
            return redirect()->back()->withErrors('File extension must be in .xls or .xlsx');
        }
    }
}
