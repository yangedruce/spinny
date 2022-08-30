<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GrandPrizeWinner;
use Illuminate\Http\Request;

class GrandPrizeWinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.grand-prize-winner.index');
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
     * @param  int  GrandPrizeWinner $grandprizewinner
     * @return \Illuminate\Http\Response
     */
    public function show(GrandPrizeWinner $grandprizewinner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  GrandPrizeWinner $grandprizewinner
     * @return \Illuminate\Http\Response
     */
    public function edit(GrandPrizeWinner $grandprizewinner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  GrandPrizeWinner $grandprizewinner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrandPrizeWinner $grandprizewinner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  GrandPrizeWinner $grandprizewinner
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrandPrizeWinner $grandprizewinner)
    {
        //
    }
}
