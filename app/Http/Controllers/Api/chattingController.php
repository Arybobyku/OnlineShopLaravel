<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\chatting;
use Illuminate\Support\Facades\Validator;

class chattingController extends Controller
{
    public function index(){

        $user = chatting::all();

        return response()->json([
            'succes'=>1,
            'message'=>'berhasil get data',
            'user'=>$user
        ]);
    }

    public function create(Request $request){
        $validasi = Validator::make($request->all(),[
            'email'=>'required',
            'token'=>'required'
        ]);
        
        if($validasi->fails()){
            $val=$validasi->errors()->all();
            return $this->error($val[0]);
        }
        
        $chatting = chatting::create(array_merge($request->all()));
        if($chatting){
            return response()->json([
                'success'=>'1',
                'message'=>'Selamat Berhasil',
                'user'=>$chatting
            ]);
        }

        return $this->error('gagal create');

    }

    public function error($param){
        return response()->json([
            'success'=>0,
            'message'=>$param
        ]);
    }
    
}
