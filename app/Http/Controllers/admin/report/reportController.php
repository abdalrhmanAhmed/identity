<?php

namespace App\Http\Controllers\admin\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\record\States;
use App\Models\record\locale;
use App\Models\record\Center;
use App\Models\record\Profile;
use App\Models\User;

class reportController extends Controller
{
    public function contry()
    {
        $states = States::all();
        $locals = locale::all();
        $centers = Center::all();
        return view('admin.reports.contry_report', compact('states', 'locals', 'centers'));
    }

    public function agents()
    {
        $users = User::all();
        $profile = Profile::all();
        return view('admin.reports.agents_report', compact('users', 'profile'));
    }
}
