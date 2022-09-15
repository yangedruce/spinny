<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserCode;
use Illuminate\Http\Request;

class UserCodeController extends Controller
{
    public function index()
    {
        $usercodes = UserCode::paginate(10);

        if (session('status') != null) {
            session()->flash('status', session('status'));
        }

        session()->forget('importError');

        // //testing
        // session()->flash('status', 'File imported successfully');

        return view('admin.usercode.index', [
            'usercodes' => $usercodes,
        ]);
    }
}
