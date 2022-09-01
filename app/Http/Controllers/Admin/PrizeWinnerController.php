<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrizeWinner;
use Illuminate\Http\Request;

class PrizeWinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prizewinners = PrizeWinner::paginate(10);

        return view('admin.prize-winner.index', ['prizewinners' => $prizewinners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  PrizeWinner $prizewinner
     * @return \Illuminate\Http\Response
     */
    public function show(PrizeWinner $prizewinner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  PrizeWinner $prizewinner
     * @return \Illuminate\Http\Response
     */
    public function edit(PrizeWinner $prizewinner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  PrizeWinner $prizewinner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrizeWinner $prizewinner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  PrizeWinner $prizewinner
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrizeWinner $prizewinner)
    {
        //
    }
}
