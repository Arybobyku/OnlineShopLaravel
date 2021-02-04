<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function login(Request $request){
        // dd($request->all());die;
        $user=User::where('email',$request->email)->first();
        if($user){
            if(\password_verify($request->password,$user->password)){
                
                return response()->json([
                    'success'=>1,
                    'message'=>'welcome '.$user->name,
                    'user'=>$user
                ]);
            }
            return $this->error('Password Incorrect');
        }
        return $this->error('Email Dosent Exist');
    }

    public function error($param){
        return response()->json([
            'success'=>0,
            'message'=>$param
        ]);
    }
}
