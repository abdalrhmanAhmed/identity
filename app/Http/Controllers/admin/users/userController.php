<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//custom Spatie\Permission
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\record\UserData;
use App\Models\record\States;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class userController extends Controller
{
    public function index(Request $request)
    {
    $data = User::orderBy('id','DESC')->paginate(5);
    return view('admin.users.show_users',compact('data'))
    ->with('i', ($request->input('page', 1) - 1) * 5);
    }//end of index

    public function create()
    {
    $roles = Role::pluck('name','name')->all();
    $state = States::pluck('id','state_name')->all();
    return view('admin.users.Add_user',compact('roles','state'));
    }//end of create

    public function store(Request $request)
    {
        // return $request;
        try
        {

        // amke the validate and stor the result in validator varibal
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'loacale' => 'required',
            'state' => 'required',
            'center' => 'required',
            'id_no' => 'required',//exists:profiles
            ]);
    
            // If there is a problem with the validation, return the error message, or else continue with the algorithm
            if($validator->fails()) {
                $test = $validator->errors();
                session()->flash('faild');
                return $test;redirect()->back();
            }

            $userData = new UserData;
            $userData->state = $request->state;
            $userData->locale = $request->loacale;
            $userData->center = $request->center;
            $userData->profile_id = $request->id_no;
            $userData->save();

            $user_data_id  = UserData::orderBy('id','DESC')->first()->id;

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->status = $request->status;
            $user->password = Hash::make($request->password);
            $user->user_data_id = $user_data_id;
            $user->save();
            $user->assignRole($request->input('roles'));
            session()->flash('success');
            return redirect()->route('admin.users.index');
        }
        catch(\Exception $e)
        {
            session()->flash('faild');
            return $e;redirect()->back();
        }

    }//end of store

    public function show($id)
    {
    $user = User::find($id);
    return view('admin.users.show',compact('user'));
    }//end of show

    public function edit($id)
    {
    $user = User::find($id);
    $roles = Role::pluck('name','name')->all();
    $userRole = $user->roles->pluck('name','name')->all();
    $state = States::pluck('id','state_name')->all();
    return view('admin.users.edit',compact('user','roles','userRole','state'));
    }//end of edit

    public function update(Request $request, $id)
    {
        // return $request;
    $this->validate($request, [
    'name' => 'required',
    'email' => 'required|email|unique:users,email,'.$id,
    'roles' => 'required',
    'loacale' => 'required',
    'state' => 'required',
    'center' => 'required',
    'id_no' => 'required',//exists:profiles
    ]);
    
    $input = $request->all();
    if(!empty($input['password'])){
        $input['password'] = Hash::make($input['password']);
    }
    
    $user = User::find($id);
    $user->update($input);
    DB::table('model_has_roles')->where('model_id',$id)->delete();
    
    $user->assignRole($request->input('roles'));
    session()->flash('success');

    $data = UserData::find($user->user_data_id);
    $data->update($input);
    return redirect()->route('admin.users.index');
    }//end of update

    public function destroy(Request $request,$id)
    {
    $id = $request->user_id;
    User::find($id)->delete();
    session()->flash('delete');
    return redirect()->route('admin.users.index');
    }//end of destroy
}
