<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PrizesImport;
use App\Models\Prize;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PrizesImportController extends Controller
{
    public function show()
    {
        return view('admin.prize.import.show');
    }

    public function store(Request $request)
    {
        $file = $request->file('import_file');

        $extension = $file->extension();

        if ($extension == 'xlsx' || $extension == 'xls') {
            Excel::import(new PrizesImport(), $file);
            $importError = false;
            if (session()->get('importError') != null) {
                $importError = session()->get('importError');
            }
            if ($importError) {
                return redirect()->back()->withErrors('Column format is invalid');
            } else {
                $request->session()->flash('status', 'File imported successfully.');

                return redirect()->route('admin.prize.index');
            }
        } else {
            return redirect()->back()->withErrors('File extension must be in .xls or .xlsx');
        }
    }
}
