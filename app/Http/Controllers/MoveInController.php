<?php

namespace App\Http\Controllers;

use App\Models\MoveIn;
use App\Http\Requests\StoreMoveInRequest;
use App\Http\Requests\UpdateMoveInRequest;

class MoveInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.movein');
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
     * @param  \App\Http\Requests\StoreMoveInRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMoveInRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MoveIn  $moveIn
     * @return \Illuminate\Http\Response
     */
    public function show(MoveIn $moveIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MoveIn  $moveIn
     * @return \Illuminate\Http\Response
     */
    public function edit(MoveIn $moveIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMoveInRequest  $request
     * @param  \App\Models\MoveIn  $moveIn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMoveInRequest $request, MoveIn $moveIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MoveIn  $moveIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoveIn $moveIn)
    {
        //
    }
}
