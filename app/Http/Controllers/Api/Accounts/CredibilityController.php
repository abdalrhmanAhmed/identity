<?php

namespace App\Http\Controllers\Api\Accounts;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Controllers\Api\Functions\BaseController;


class CredibilityController extends BaseController
{


    public function register(Request $request){

        $validate = validator::make($request->all(),[
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if($validate->fails()){
            return $this->sendError('error falidator', $validate->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $users = User::create($input);
        $success['token'] = $users->createToken('eaeu')->accessToken;
        $success['name'] = $users->name;

        return $this->sendResponse($success, 'user created succesfully');

    }

}
