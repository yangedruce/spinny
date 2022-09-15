<?php

namespace App\Http\Controllers\Admin;

use App\Imports\SpinCodesImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SpinCodesImportController extends Controller
{
    public function show()
    {
        return view('admin.spin-code.import.show');
    }

    public function store(Request $request)
    {
        $file = $request->file('import_file');

        $extension = $file->extension();

        if ($extension == 'xlsx' || $extension == 'xls') {
            Excel::import(new SpinCodesImport(), $file);
            $importError = false;
            if (session()->get('importError') != null) {
                $importError = session()->get('importError');
            }
            if ($importError) {
                return redirect()->back()->withErrors('Column format is invalid');
            } else {
                $request->session()->flash('status', 'File imported successfully.');

                return redirect()->route('admin.spin.code.index');
            }
        } else {
            return redirect()->back()->withErrors('File extension must be in .xls or .xlsx');
        }
    }
}
