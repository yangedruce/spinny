<?php

namespace App\Http\Controllers;

use App\Models\UserCode;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
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
     * @param  \App\Models\UserCode $usercode
     * @return \Illuminate\Http\Response
     */
    public function show(UserCode $usercode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCode $usercode
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCode $usercode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCode $usercode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCode $usercode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCode $usercode
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCode $usercode)
    {
        //
    }
}
