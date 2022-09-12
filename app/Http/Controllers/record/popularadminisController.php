<?php

namespace App\Http\Controllers\record;

use Illuminate\Http\Request;
use App\Models\record\Popularadministrations;
use Spatie\Permission\Models\Permission;
use DB;
use App\Http\Controllers\Controller;
class popularadminisController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Popularadministration = Popularadministrations::all();
    return view('admin.record.popularadministrations.index', compact('Popularadministration'));
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
            'popular_name' => 'required',
        ]);//end of validation

        $Popularadministration = Popularadministrations::create(['popular_name' => $request->popular_name]);
        session()->flash('success');
        return redirect()->route('admin.record.popularadministrations.index');
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
        $Popularadministration = Popularadministrations::where('id', $id)
        ->update(['popular_name' => $request->popular_name]);
        session()->flash('success');
        return redirect()->route('admin.record.popularadministrations.index');
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
        $Popularadministration = Popularadministrations::destroy($id);
        session()->flash('success');
        return redirect()->route('admin.record.popularadministrations.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }



}
