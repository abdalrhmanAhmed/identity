<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\record\States;

class StatesController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $States = States::all();
    return view('admin.record.states.index',compact('States'));
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

    try
    {
        // return $request;
        $this->validate($request, [
            'state_name' => 'required',
        ]);//end of validation

        $input = $request->all();
        $States = States::create($input);
        session()->flash('success');
        return redirect()->route('admin.record.states.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
        $States = States::where('id', $id)
        ->update(['state_name' => $request->state_name]);
        session()->flash('success');
        return redirect()->route('admin.record.states.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
        $States = States::destroy($id);
        session()->flash('success');
        return redirect()->route('admin.record.states.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

}

?>
