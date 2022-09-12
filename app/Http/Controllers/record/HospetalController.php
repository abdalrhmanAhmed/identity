<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;


use App\Models\record\Hospetal;
use App\Models\record\locale;
use App\Models\record\UserData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospetalController extends Controller
{


    public  function IDGenerator($model, $trow, $length = 4, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first();
        if(!$data)
        {
            $og_length = $length;
            $last_number = '';
        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $actial_last_number = ($code/1)*1;
            $increment_last_number = $actial_last_number+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for($i = 1; $i<$og_length; $i++)
        {
            $zeros .= "0";
        }
        return $prefix . "-" . $zeros . $last_number;
    }

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
        $hospetal = Hospetal::get();
        $locales = locale::get();
        return view('admin.record.hospetals.dathe.index',compact('hospetal','locales'));
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
    public function storeb(Request $request)
    {
        // return $request;
        $h_no = $this->IDGenerator(new Hospetal(), 'h_no', 5, 'BDOC');
        $user = User::where('id',Auth::id())->first();
        $data = UserData::where('id',$user->user_data_id)->first()->locale;
        $local_id = locale::where('id',$data)->first();
        $id_no = 1;
        $descrption = "kopjkf";
        $type = 1;
        $file = 'jiofgj';
        return $local_id;
    }    
    public function stored(Request $request)
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
