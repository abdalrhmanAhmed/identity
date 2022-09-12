<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\record\Education;
use Spatie\Permission\Models\Permission;

class EducationController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $educationName = Education::all();
    return view('admin.record.education.index', compact('educationName'));
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
            'name' => 'required',
        ]);//end of validation

        $educationName = Education::create(['name' => $request->name]);
        session()->flash('success');
        return redirect()->route('admin.record.education.index');
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
        $educationName = Education::where('id', $id)
        ->update(['name' => $request->name]);
        session()->flash('success');
        return redirect()->route('admin.record.education.index');
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
        $educationName = Education::destroy($id);
        session()->flash('success');
        return redirect()->route('admin.record.education.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

}

?>
