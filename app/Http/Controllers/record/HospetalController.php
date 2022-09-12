<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;


use App\Models\record\Hospetal;
use App\Models\record\locale;
use App\Models\record\UserData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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
        $users = User::first();
        return view('admin.record.hospetals.barth.index',compact('hospetal','locales','users'));
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
        // return $request;
        $user = User::where('id',Auth::id())->first();
        $data = UserData::where('id',$user->user_data_id)->first()->locale;
        $local_id = locale::where('id',$data)->first()->id;
       try
       {
   
         // amke the validate and stor the result in validator varibal
         $validator = Validator::make($request->all(), [
           'id_no' => 'required',
           'descrption' => 'required',
           'files' => 'required',
         ]);
   
         // If there is a problem with the validation, return the error message, or else continue with the algorithm
         if($validator->fails()) {
             return $validator->errors();
         }

           $hospetal = new Hospetal;
           $hospetal->h_no = $this->IDGenerator(new Hospetal(), 'h_no', 5, 'BDOC');
           $hospetal->local_id = $local_id;
           $hospetal->id_no = $request->id_no;
           $hospetal->descrption = $request->descrption;
           $hospetal->type = $request->type;//$request->type;
           $hospetal->files_route = 'test';//$request->files;
           $hospetal->save();
           session()->flash('success');
           return redirect()->back();
       }
       catch(\Exception $e)
       {
           return $e;redirect()->back();
       }
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
    public function edit(Request $request)
    {
            //   return $request;
              try{
                  $center = Hospetal::where('id',$request->id)->update([
                    'id_no' => $request->id_no,
                    'descrption' => $request->descrption,
                    'type' => $request->type,
                    'files_route' => 'test'
                  ]);
                  session()->flash('update');
                  return redirect()->back();
              }
              catch(\Exception $e)
              {
                  return $e;redirect()->back();
              }   
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
    public function destroy(Request $hospetal)
    {
        try
        {
            $town = Hospetal::destroy($hospetal->id);
            session()->flash('delete');
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            session()->flash('error');
            return $e; redirect()->back();        
        }
    }
}
