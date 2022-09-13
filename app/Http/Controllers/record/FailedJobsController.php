<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\record\falids_jobs;
use Spatie\Permission\Models\Permission;

class FailedJobsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $FailedJobsName = falids_jobs::all();
    return view('admin.record.failed_jobs.index', compact('FailedJobsName'));
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
        $request->validate([
            'name' => 'required',
        ]);//end of validation

        $faildJobs = new falids_jobs();
        $faildJobs->name = $request->name;
        $faildJobs->save();
        session()->flash('success');
        return redirect()->back();
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
        $FailedJobsName = falids_jobs::where('id', $id)
        ->update(['name' => $request->name]);
        session()->flash('success');
        return redirect()->route('admin.record.FailedJobs.index');
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
        $FailedJobsName = falids_jobs::destroy($id);
        session()->flash('success');
        return redirect()->route('admin.record.FailedJobs.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

}

?>
