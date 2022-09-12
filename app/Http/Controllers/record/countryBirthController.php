<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\record\CountryBirths;
use Spatie\Permission\Models\Permission;

class countryBirthController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $CountryName = CountryBirths::all();
    return view('admin.record.cuntry_birth.index', compact('CountryName'));
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
            'c_name' => 'required',
        ]);//end of validation

        $CountryName = CountryBirths::create(['c_name' => $request->c_name,'s_key' => $request->s_key]);
        session()->flash('success');
        return redirect()->route('admin.record.cuntry_birth.index');
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
        $data = $request->all();
        $CountryName = CountryBirths::where('id', $id)
        ->update(['c_name' => $request->c_name,'s_key' => $request->s_key]);
        session()->flash('success');
        return redirect()->route('admin.record.cuntry_birth.index');
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
        $CountryName = CountryBirths::destroy($id);
        session()->flash('success');
        return redirect()->route('admin.record.cuntry_birth.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

}

?>
