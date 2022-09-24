<?php

namespace App\Http\Controllers\record;

use App\Models\record\Profile;
use App\Models\record\Ticket;
use App\Models\record\locale;
use App\Models\record\center;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DnaRequest;
use App\Models\record\ClientDna;
use Maatwebsite\Excel\Facades\Excel;



class ProfileController extends Controller
{



    public  function IDGenerator($model, $trow, $length = 4, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first();
        if(!$data)
        {
            $og_length = $length;
            $last_number = '';
        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $actial_last_number = ($code/1)*1;
            $increment_last_number = $actial_last_number+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for($i = 1; $i<$og_length; $i++)
        {
            $zeros .= "0";
        }
        return $prefix . "-" . $zeros . $last_number;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Profiles = Profile::orderBy('id', 'desc')->get();
        $tickets = Ticket::orderBy('id', 'desc')->get();
        return view('admin.record.profiles.index',compact('Profiles','tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.record.profiles.rebort');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
    
            // amke the validate and stor the result in validator varibal
            $validator = Validator::make($request->all(), [
            'mother_name' => 'required',
            ]);
    
            // If there is a problem with the validation, return the error message, or else continue with the algorithm
            if($validator->fails()) {
                return $validator->errors();
            }

            $pro_id = $this->IDGenerator(new Profile(), 'pro_id', 5, 'PRO');
    
            $Profile = new Profile;
            $Profile->pro_id        = $pro_id;
            $Profile->track_id      = $request->ticket_id .'-'. $pro_id;
            $Profile->status        = 0;
            $Profile->ticket_id     = $request->ticket_id;
            $Profile->mother_name   = $request->mother_name;
            $Profile->user_id       = Auth::id();
            $Profile->save();
            session()->flash('success');
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return $e;redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\record\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Profile = Profile::where('id',$id)->first();
        return view('admin.record.profiles.profileinfo',compact('Profile'));
    }

    public function getLocal($id){
        $local = locale::where('state_id',$id)->pluck("local_name", "id");
        return json_encode($local);
    }
    public function getCenter($id){
        $local = center::where('local_id',$id)->pluck("center_name", "id");
        return json_encode($local);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\record\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\record\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\record\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function newFile($id){
        $profile = Profile::where('pro_id',$id)->first();
        return view('admin.record.profiles.profileData',compact('profile'));
    }

    public function uploadDna(DnaRequest $request){
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
