<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpinCode;
use Illuminate\Http\Request;

class SpinCodeController extends Controller
{
    public function index()
    {
        $spinCodes = SpinCode::paginate(10);

        if (session('status') != null) {
            session()->flash('status', session('status'));
        }

        session()->forget('importError');

        // //testing
        // session()->flash('status', 'File imported successfully');

        return view('admin.spin-code.index', [
            'spinCodes' => $spinCodes,
        ]);
    }
}
