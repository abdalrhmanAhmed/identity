<?php

namespace App\Http\Controllers\record;

use App\Models\record\Center;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\record\locale;
use Illuminate\Support\Facades\Validator;



class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locales = locale::all();
        $centers = Center::all();
        return view('admin.record.centers.index',compact('centers','locales'));
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
       try
       {
   
         // amke the validate and stor the result in validator varibal
         $validator = Validator::make($request->all(), [
           'center_name' => 'required',
           'local_id' => 'required',
         ]);
   
         // If there is a problem with the validation, return the error message, or else continue with the algorithm
         if($validator->fails()) {
             return $validator->errors();
         }

           $center = new center;
           $center->center_name = $request->center_name;
           $center->local_id = $request->local_id;
           $center->save();
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
     * @param  \App\Models\record\center  $center
     * @return \Illuminate\Http\Response
     */
    public function show(center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\record\center  $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        // return $request;
        try{
    
            // amke the validate and stor the result in validator varibal
            $validator = Validator::make($request->all(), [
              'center_name' => 'required',
              'local_id' => 'required',
            ]);
      
            // If there is a problem with the validation, return the error message, or else continue with the algorithm
            if($validator->fails()) {
                return $validator->errors();
            }

              $center = Center::where('id',$id)->update(['center_name'=>$request->center_name,'local_id'=> $request->local_id]);
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
     * @param  \App\Models\record\center  $center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, center $center)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\record\center  $center
     * @return \Illuminate\Http\Response
     */
    public function destroy(center $center)
    {
        try
        {
            $town = center::destroy($center->id);
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
