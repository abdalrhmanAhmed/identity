<?php

namespace App\Http\Controllers;

use App\Models\record\Client;
use Illuminate\Http\Request;

class WatcherController extends Controller
{
    public function index(){
        $clients = Client::get();
        return view('admin.record.watcher.index',compact('clients'));
    }

    public function invoice(Request $request){
        $client = Client::where('id_number',$request->id)->first();
        return view('admin.record.watcher.invoice',compact('client'));
    }

    public function Comper(Request $request){
        return $request;
        try {
            $array = Excel::toArray(new ClientDna, $request->select_file);
            $D3S1358 = $array[0][0][0];
            $VWA = $array[0][0][1];
            $FGA = $array[0][0][2];
            $D8S1179 = $array[0][0][3];
            $D21S11 = $array[0][0][4];
            $D18S51 = $array[0][0][5];
            $D5S818 = $array[0][0][6];
            $D13S317 = $array[0][0][7];
            $D7S820 = $array[0][0][8];
            $D16S539 = $array[0][0][9];
            $THO1 = $array[0][0][10];
            $TPOX = $array[0][0][11];
            $CSF1PO = $array[0][0][12];
            $dna = new ClientDna;
            $dna->D3S1358  = $D3S1358;
            $dna->VWA      = $VWA;
            $dna->FGA      = $FGA;
            $dna->D8S1179  = $D8S1179;
            $dna->D21S11   = $D21S11;
            $dna->D18S51   = $D18S51;
            $dna->D5S818   = $D5S818;
            $dna->D13S317  = $D13S317;
            $dna->D7S820   = $D7S820;
            $dna->D16S539  = $D16S539;
            $dna->THO1     = $THO1;
            $dna->TPOX     = $TPOX;
            $dna->CSF1PO   = $CSF1PO;
            $dna->save();
            
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
        
    }
    }
}
