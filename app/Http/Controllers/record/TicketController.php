<?php

namespace App\Http\Controllers\record;
use App\Http\Controllers\Controller;
use App\Models\record\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;


class TicketController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->payed;
        try
        {
    
          // amke the validate and stor the result in validator varibal
          $validator = Validator::make($request->all(), [
            'client_name' => 'required',
            'client_phone' => 'required',
          ]);
    
          // If there is a problem with the validation, return the error message, or else continue with the algorithm
          if($validator->fails()) {
              return $validator->errors();
          }

            $ticket_id = $this->IDGenerator(new Ticket(), 'tiket_id', 5, 'TIC');
            $payed = $request->payed == 'on' ? 1: 0 ;
 
            $Ticket = new Ticket;
            $Ticket->client_name    = $request->client_name;
            $Ticket->client_phone   = $request->client_phone;
            if($request->exists('client_id')){
                $Ticket->client_id      = $request->client_id;
            }
            $Ticket->status         = 0;
            $Ticket->payed          = $payed;
            $Ticket->user_id        = Auth::id();
            $Ticket->tiket_id       = $ticket_id;
            $Ticket->save();
            session()->flash('success');
            return redirect()->back();
        }
        catch(\Exception $e)
        {
            return $e;redirect()->back();
        }    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        if ($request->exists('payed')) {
        try{
              $ticket = Ticket::where('id',$id)->update(['payed'=>1]);
              session()->flash('update');
              return redirect()->back();
          }
          catch(\Exception $e)
          {
              return $e;redirect()->back();
          }    
        
        }else{
            return 0;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(ticket $ticket)
    {
        //
    }
}
