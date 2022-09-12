<?php

namespace App\Http\Controllers;

use App\Models\record\center;
use App\Models\record\Profile;
use App\Models\record\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = count(User::get());
        $centers = count(center::get());
        $profiles = count(Profile::get());
        $teckets = count(Ticket::get());
        return view('home',compact('users','centers','profiles','teckets'));
    }
}
