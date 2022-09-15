<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prize;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    public function index()
    {
        $prizes = Prize::paginate(10);

        if (session('status') != null) {
            session()->flash('status', session('status'));
        }

        session()->forget('importError');

        return view('admin.prize.index', ['prizes' => $prizes]);
    }
}
