<?php

namespace App\Http\Controllers\record;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\record\Profile;
use App\Models\record\CountryBirths;
use App\Models\record\BloodType;
use App\Models\record\Social_situation;
use App\Models\record\Professions;
use App\Models\record\Education;
use App\Models\record\FailedJobs;
// use App\Models\record\Profile;


class ClientsController extends Controller
{
    public function index($id){
        $profile = Profile::where('pro_id',$id)->first();
        $parthPalces = CountryBirths::all();
        $bloodTypes = BloodType::all();
        $socialSituations = Social_situation::all();
        $professionss = Professions::all();
        $educations = Education::all();
        $failedjobs = FailedJobs::all();
        return view('admin.record.profiles.profileData',compact('failedjobs','profile','parthPalces','bloodTypes','socialSituations','professionss','educations'));
    }

    public function store(Request $request){
        return $request;
    }
}
