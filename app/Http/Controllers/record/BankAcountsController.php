<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\record\BankName;
use Spatie\Permission\Models\Permission;

class BankAcountsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request)
  {
    $BankName = BankName::orderBy('id','DESC')->paginate(5);
    return view('admin.record.banks.index', compact('BankName'))
    ->with('i', ($request->input('page', 1) - 1) * 5);
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
            'bank_name' => 'required',
        ]);//end of validation

        $bankName = BankName::create(['b_name' => $request->bank_name]);
        session()->flash('success');
        return redirect()->route('admin.record.banks.index');
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
        $bankName = BankName::where('id', $id)
        ->update(['b_name' => $request->b_name]);
        session()->flash('update');
        return redirect()->route('admin.record.banks.index');
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
        $bankName = BankName::destroy($id);
        session()->flash('delete');
        return redirect()->route('admin.record.banks.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

}

?>
