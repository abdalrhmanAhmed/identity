<?php

namespace App\Http\Controllers\record;

use App\Http\Controllers\Controller;
use App\Models\BarthDathe;
use App\Models\record\Profile;
use App\Models\record\Ticket;
use Illuminate\Http\Request;

class BarthDatheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::orderBy('id', 'desc')->get();
        return view('admin.record.barth-dathe.index',compact('tickets'));
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
     * @param  \App\Models\BarthDathe  $barthDathe
     * @return \Illuminate\Http\Response
     */
    public function show(BarthDathe $barthDathe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarthDathe  $barthDathe
     * @return \Illuminate\Http\Response
     */
    public function edit(BarthDathe $barthDathe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarthDathe  $barthDathe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarthDathe $barthDathe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarthDathe  $barthDathe
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarthDathe $barthDathe)
    {
        //
    }
}
