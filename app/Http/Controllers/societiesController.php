<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\societiesModel;
use App\Http\Resources\societiesResource;

class societiesController extends Controller
{
    public function login(Request $request)
    {
        $societies = societiesModel::where('id_card_number', $request->id_card_number)->where('password', $request->password)->first();
        if($societies){
            $societies->login_tokens = md5($societies->id_card_number);
            $societies->save();
            $societiesNew = societiesModel::where("id_card_number", $request->id_card_number)->first();
            return response()->json([
                new societiesResource($societiesNew)
            ]);
        } else{
            return response()->json([
                "message" => "ID Card Number or Password incorrect"
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        $societies = societiesModel::where('login_tokens', $request->token)->first();
        if($societies){
            $societies->login_tokens = null;
            $societies->save();
            return response()->json([
                'message' => 'succesfully logout'
            ]);
        }else{
            return response()->json([
                'message' => 'Gagal logout'
            ]);
        }
    }
}
