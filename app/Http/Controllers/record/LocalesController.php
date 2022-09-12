<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\record\locale;
use App\Models\record\States;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;


class LocalesController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $localName = locale::all();
    $statesName = States::all();
    return view('admin.record.locales.index', compact('localName','statesName'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    // $local_name = locale::create(['local_name' => $request->local_name]);
// return $request;
    try
    {

      // amke the validate and stor the result in validator varibal
      $validator = Validator::make($request->all(), [
        'local_name' => 'required',
        'istate_id' => 'required',
      ]);

      // If there is a problem with the validation, return the error message, or else continue with the algorithm
      if($validator->fails()) {
          return $validator->errors();
      }

        // $input = $request->all();
        // $local_name = locale::create($input);

        $local = new Locale;
        $local->local_name = $request->local_name;
        $local->state_id = $request->istate_id;
        $local->save();
        session()->flash('success');
        return redirect()->back();
    }
    catch(\Exception $e)
    {
        return redirect()->back();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $request,$id)
  {
    try
    {
        $localName = locale::where('id', $id)
        ->update(['local_name' => $request->local_name]);
        session()->flash('success');
        return redirect()->route('admin.record.locales.index');
    }
    catch(\Exception $e)
    {
        session()->flash('fild');
        return redirect()->back();
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    try
    {
        $localName = locale::destroy($id);
        session()->flash('success');
        return redirect()->route('admin.record.locales.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

}

?>
