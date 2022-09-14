<?php

namespace App\Http\Controllers\record;

use App\Http\Controllers\Controller;
use App\Models\IdInformation;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use App\Models\record\Profile;
use App\Models\record\CountryBirths;
use App\Models\record\BloodType;
use App\Models\record\Client;
use App\Models\record\Social_situation;
use App\Models\record\Professions;
use App\Models\record\Education;
use App\Models\record\FailedJobs;
use App\Models\record\falids_jobs;

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
        $failedjobs = falids_jobs::all();
        return view('admin.record.profiles.profileData',compact('failedjobs','profile','parthPalces','bloodTypes','socialSituations','professionss','educations'));
    }


    public function store(Request $request){

        // try{
            $profile = Profile::where('pro_id',$request->pro_id)->first();
            if($request->personal_infromation){
                return $this->personal_information($request, $profile);
            }elseif($request->id_information){
                return $this->id_information($request, $profile);
            }elseif($request->disability_information){
                return $this->disability_information($request, $profile);
            }elseif($request->witness_information){
                return "witness_information";
            }else{
                return 'marry_information';
            }
        // }
        // catch (\Exception $e)
        // {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
    }

    public function personal_information($request, $profile)
    { 
        $personal_information = new PersonalInformation();
        $personal_information->trak_id = $profile->track_id;
        $personal_information->full_name_ar = $request->fname_ar . ' ' . $request->sname_ar . ' ' . $request->tname_ar . ' ' . $request->forthname_ar;
        $personal_information->full_name_en = $request->fname_en . ' ' . $request->sname_en . ' ' . $request->tname_en . ' ' . $request->forthname_en;
        $personal_information->gender = $request->gender;
        $personal_information->brith_day = $request->parth_date;
        $personal_information->contry_place_id = $request->contry_parth;
        $personal_information->father_national_number = $request->father_id;
        $personal_information->brith_certificat_number = $request->barth_id;
        $personal_information->blood_type_id = $request->blood_type;
        $personal_information->social_situation = $request->setuation_type;
        $personal_information->job_id = $request->profistional;
        $personal_information->occupational_classification = $request->fild_job;
        $personal_information->qualification = $request->education;
        $personal_information->phone_number = $request->phone;
        $personal_information->email = $request->email;
        $personal_information->mother_national_number = $request->mather_id;
        $personal_information->mother_name = $request->mother_name;
        $personal_information->save();
        session()->flash('success');
        return redirect()->back();
    }//end of personal_information

    public function id_information($request, $profile)
    {
        $id_information = new IdInformation();
        $id_information->trak_id = $profile->track_id;
        $id_information->britrh_state = $request->state;
        $id_information->britrh_local = $request->locale;
        $id_information->britrh_adminstrative_unit = $request->admin_unit;
        $id_information->britrh_peoples_adminstration = $request->pepuler_unit;
        $id_information->work_state_place = $request->work_state;
        $id_information->work_local_place = $request->work_state_unit;
        $id_information->work_adminstrative_unit = $request->worck_admin_unit;
        $id_information->work_peoples_adminstration = $request->worck_pepuler_unit;
        $id_information->work_place = $request->worck_place;
        $id_information->nationality_type = $request->nationality_type;
        $id_information->nationality_number = $request->nationality_number;
        $id_information->religion = $request->religion;
        $id_information->old_nationality_number = $request->old_nationality_number;
        $id_information->mother_lang = $request->mother_lang;
        $id_information->name_before_naturalization = $request->name_before_naturalization;
        $id_information->mother_name_brfore_naturalization = $request->mother_name_brfore_naturalization;
        $id_information->father_name_before_naturalization = $request->father_name_before_naturalization;
        $id_information->save();
        session()->flash('success');
        return redirect()->back();
    }//end of id_information

    public function disability_information($request, $profile)
    {

    }//end of disability_information
}
