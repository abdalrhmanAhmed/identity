<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;


use App\Models\record\Hospetal;
use App\Models\record\locale;
use Illuminate\Http\Request;

class HospetalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexb()
    {
        $hospetal = Hospetal::get();
        $locales = locale::get();
        return view('admin.record.hospetals.barth.index',compact('hospetal','locales'));
    }
    public function indexd()
    {
        return view('admin.record.hospetals.dathe.index');
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
     * @param  \App\Models\Hospetal  $hospetal
     * @return \Illuminate\Http\Response
     */
    public function show(Hospetal $hospetal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospetal  $hospetal
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospetal $hospetal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospetal  $hospetal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospetal $hospetal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospetal  $hospetal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospetal $hospetal)
    {
        //
    }
}
