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

    public function send(Request $request){
                $title = $request->title;
                $message = $request->message;

                $curl = curl_init();
                $authKey = "key=AAAAuGdF3eA:APA91bHir5e_xRAHLnNsp9s74KQ0BrmjEqQf3OtkIbPn1wbn0kPe_8Pj89vbzusL8HcTypHxQv-OSKegz6Nr396uBHBf8LmOOMl1PdVZeEWFa7EJNa-zRjocDMIJ9Iomdg59Mk_dMmG_";
                $registration_ids = '["fNd6T6omRKm9mVODG_eIHG:APA91bHuXOXDUodUZ2XXtWnuTq7KSt9ZYxpsMeR8NR8tLZMCmsyeuGM3Eqlu9e0_karDjxayZ6_q3uCAXJj0IPQq0ob2ThOmVOE2-pA1nPCBc3hUHbHnSIkaf88PBWlJIGwp2yGOhQaG"]';
                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => '{
                                "registration_ids": ' . $registration_ids . ',
                                "notification": {
                                    "title": " '. $title .'",
                                    "body": "'. $message .'"
                                }
                            }',
                CURLOPT_HTTPHEADER => array(
                    "Authorization: " . $authKey,
                    "Content-Type: application/json",
                    "cache-control: no-cache"
                ),
                ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            echo $response;
            }
    }
    
}
