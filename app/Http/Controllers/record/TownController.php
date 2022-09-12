<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;
use App\Models\record\town;
use App\Models\record\locale;
use App\Models\record\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $towns = town::all();
        $locales = locale::all();
        $States = States::all();
        return view('admin.record.town.index',compact('towns','locales','States'));
    }

    public function store(Request $request)
    {
        // return $request;
        try
        {
    
          // amke the validate and stor the result in validator varibal
          $validator = Validator::make($request->all(), [
            'town_name' => 'required',
            'state_id' => 'required',
            'local_id' => 'required',
          ]);
    
          // If there is a problem with the validation, return the error message, or else continue with the algorithm
          if($validator->fails()) {
              return $validator->errors();
          }
    
            // $input = $request->all();
            // $local_name = locale::create($input);
    
            $town = new town;
            $town->town_name = $request->town_name;
            $town->stats_id = $request->state_id;
            $town->locae_id = $request->local_id;
            $town->save();
            session()->flash('success');
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return redirect()->back();
        }
    }


    public function edit(Request $request,$id)
    {
        // return $request;
        try{
    
            // amke the validate and stor the result in validator varibal
            $validator = Validator::make($request->all(), [
              'town_name' => 'required',
              'state_id' => 'required',
              'local_id' => 'required',
            ]);
      
            // If there is a problem with the validation, return the error message, or else continue with the algorithm
            if($validator->fails()) {
                return $validator->errors();
            }

              $town = town::where('id',$id)->update(['town_name'=>$request->town_name,'locae_id'=> $request->local_id,'stats_id'=>$request->state_id]);
              session()->flash('update');
              return redirect()->back();
          }
          catch(\Exception $e)
          {
              return redirect()->back();
          }
    }

    public function destroy( $id)
    {
        try
        {
            $town = town::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
