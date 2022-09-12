<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\record\Social_situation;
use Spatie\Permission\Models\Permission;

class Social_situationController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $SocialSituation = Social_situation::all();
    return view('admin.record.social_situation.index', compact('SocialSituation'));
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
            's_name' => 'required',
        ]);//end of validation

        $SocialSituation = Social_situation::create(['s_name' => $request->s_name]);
        session()->flash('success');
        return redirect()->route('admin.record.social_situation.index');
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
        $SocialSituation = Social_situation::where('id', $id)
        ->update(['s_name' => $request->s_name]);
        session()->flash('success');
        return redirect()->route('admin.record.social_situation.index');
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
        $SocialSituation = Social_situation::destroy($id);
        session()->flash('success');
        return redirect()->route('admin.record.social_situation.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

}

?>
