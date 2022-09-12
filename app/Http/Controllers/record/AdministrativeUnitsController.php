<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Models\record\AdministrativeUnits;
use Spatie\Permission\Models\Permission;

class AdministrativeUnitsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $administrativeUnit = AdministrativeUnits::all();
    return view('admin.record.administrativeUnits.index', compact('administrativeUnit'));
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
            'adminis_name' => 'required',
        ]);//end of validation

        $administrativeUnit = new AdministrativeUnits;//::create(['adminis_name' => $request->adminis_name]);
        $administrativeUnit->adminis_name = $request->adminis_name;
        $administrativeUnit->save();
        session()->flash('success');
        return redirect()->back();
    }
    catch(\Exception $e)
    {
      return $e;
      session()->flash('faild');
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
        $administrativeUnit = AdministrativeUnits::where('id', $id)
        ->update(['adminis_name' => $request->adminis_name]);
        session()->flash('success');
        return redirect()->back();
    }
    catch(\Exception $e)
    {
        session()->flash('faild');
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
        $administrativeUnit = AdministrativeUnits::destroy($id);
        session()->flash('success');
        return redirect()->back();
    }
    catch(\Exception $e)
    {
        session()->flash('faild');
        return redirect()->back();
    }
  }

}

?>
