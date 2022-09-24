<?php

namespace App\Http\Controllers\record;

use App\Http\Controllers\Controller;
use App\Models\Client as ModelsClient;
use App\Models\DisabilityInformation;
use App\Models\IdInformation;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use App\Models\record\Profile;
use App\Models\record\Client;
use App\Models\record\CountryBirths;
use App\Models\record\BloodType;
use App\Models\record\Social_situation;
use App\Models\record\Professions;
use App\Models\record\Education;
use App\Models\record\falids_jobs;
use App\Models\record\UserData;
use App\Models\User;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
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
    public function index($id){
        $profile = Profile::where('pro_id',$id)->first();
        $parthPalces = CountryBirths::all();
        $bloodTypes = BloodType::all();
        $socialSituations = Social_situation::all();
        $professionss = Professions::all();
        $educations = Education::all();
        $failedjobs = falids_jobs::all();
        $clients = Client::where('track_number', $profile->track_id)->first();
        $profileData = PersonalInformation::where('trak_id', $profile->track_id)->first();
        $id_information = IdInformation::where('trak_id', $profile->track_id)->first();
        $disability_information = DisabilityInformation::where('trak_id', $profile->track_id)->first();
        return view('admin.record.profiles.profileData',compact(
            'failedjobs',
            'profile',
            'parthPalces',
            'bloodTypes',
            'socialSituations',
            'professionss',
            'educations',
            'clients',
            'profileData',
            'id_information',
            'disability_information'
        ));
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
                return $this->witness_information($request, $profile);
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
        
        DB::beginTransaction();
        try{
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
            
            $id_number = $this->IDGenerator(new Client(), 'id_number', 8, 'ID');
    
            $clients = new Client();
            $clients->id_number = $id_number;
            $clients->track_number = $personal_information->trak_id;
            $clients->bank_number =1;
            $clients->trafic_number =1;
            $clients->dapt_number = 1;
            $clients->personal_information = $personal_information->id;
            $clients->save();

            $userData = new UserData();
            $userData->state = Auth::user()->userData->state;
            $userData->locale = Auth::user()->userData->locale;
            $userData->center = Auth::user()->userData->center;
            $userData->profile_id = $profile->id;
            $userData->save();

            $users = new User();
            $users->name = $request->fname_en;
            $users->email = $request->email;
            $users->password = Hash::make('0000');
            $users->id_number = $id_number;
            $users->status = 1;
            $users->user_data_id  = $userData->id;
            $users->save();
            $users->assignRole('client');
            DB::commit();


            // sms
            $phone = $request->phone ;
            $curl = curl_init();
            $text1 = 'مرحبا ';
            $name = $request->fname_ar . ' ' . $request->sname_ar . ' ' . $request->tname_ar . ' ' . $request->forthname_ar;
            $text2 = ' تم تكوين رقمك الوطني بنجاح شكرا لإستخدامك نظام هويتي ';
            $data = " إميليك هو {{$request->email}} و كلمة مرورك هي 0000 الرجاء عدم مشاركتها مع أحد ";
            $message = $text1.$name.$text2.$data;
            $from = "SILAL";
            $key = 'Z0JxbmJid2Jrbm5qaU5NZWpsSWs=';


            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://mazinhost.com/smsv1/sms/api",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "action=send-sms&api_key=$key&to=249$phone&from=$from&sms=$message&unicode=1",
            ));
            // https://mazinhost.com/smsv1/sms/api?action=send-sms&api_key=Z0JxbmJid2Jrbm5qaU5NZWpsSWs=&to=249927701513&from=SILAL&sms=Wake%20Up%20Sleepy

                $response = curl_exec($curl);

                curl_close($curl);

                $response = json_decode($response,true);
            $response;
            // end sms
            session()->flash('success');
            return redirect()->back();
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }//end of personal_information

    public function id_information($request, $profile)
    {
        DB::beginTransaction();
        try{
            $id_information = new IdInformation();
            $id_information->trak_id = $profile->track_id;
            $id_information->britrh_state = $request->state;
            $id_information->britrh_local = $request->locale;
            $id_information->britrh_adminstrative_unit = $request->admin_unit;
            $id_information->britrh_peoples_adminstration = $request->pepuler_unit;
            $id_information->work_state_place = $request->worck_state;
            $id_information->work_local_place = $request->worck_state_unit;
            $id_information->work_adminstrative_unit = $request->worck_admin_unite;
            $id_information->work_peoples_adminstration = $request->worck_pepuler_ubit;
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

            $clients = Client::where('track_number', $profile->track_id)->first();
            if($clients)
            {
                $clients->update([
                    'id_information' => $id_information->id
                ]);
                DB::commit();
            }else{

                DB::rollBack();
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();
        }
        catch(\Exception $e){
            DB::rollBack();
            session()->flash('error');
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }//end of id_information

    public function disability_information($request, $profile)
    {
        if($request->hasfile('files'))
        {
            foreach($request->file('files') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/upload/disability/', $name);  
                $data[] = $name; 
            }
            $file= new DisabilityInformation();
            $file->trak_id = $profile->track_id;
            $file->file_name=json_encode($data);
            $file->save();

            $clients = Client::where('track_number', $profile->track_id)->first();
            if($clients)
            {
                $clients->update([
                    'disability_information' => $file->id
                ]);
                DB::commit();
            }else{
                DB::rollBack();
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();
        }
    }//end of disability_information

    public function witness_information($request, $profile)
    {
        return $request;
    }//end of witness_information

    public function get_witness($id)
    {
        $witness = IdInformation::where('nationality_number', $id)->pluck('id', 'trak_id');
        $name = $witness->personal_information->full_name_ar;
        return $name;
    }

    public function getFatherName($id){
        $clients = Client::where('id_number',$id)->first();
        $personal_information = PersonalInformation::where('id', $clients->personal_information)->pluck('full_name_ar');
        return $personal_information;
    }
}
