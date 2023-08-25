<?php

namespace App\Http\Controllers;

use App\Http\Resources\validationResource;
use App\Models\job_categories;
use App\Models\societiesModel;
use App\Models\validationsModel;
use App\Models\validatorsModel;
use Illuminate\Http\Request;

class validationController extends Controller
{
    public function validation(Request $request)
    {
        $societies = societiesModel::where('login_tokens', $request->token)->first();
        if(!$societies){
            return response()->json([
                'message' => 'invalid token providied'
            ]);
        }

        $jobCategory = job_categories::find($request->job_category_id);
        if(!$jobCategory){
            return response()->json([
                'message' => 'invalid Id Category providied'
            ]);
        }
        $validators = validatorsModel::find($request->validator_id);
        if(!$validators){
            return response()->json([
                'message' => 'invalid Id Category providied'
            ]);
        }

        $validation = new validationsModel();
        $validation->society_id = $societies->id;
        $validation->job_category_id = $request->job_category_id;
        $validation->validator_id = $request->validator_id;
        $validation->work_experience = $request->work_experience;
        $validation->job_position = $request->job_position;
        $validation->reason_accepted = $request->reason_accepted;
        $validation->save();
        return response()->json([
            'message' => 'request data validation succesfully'
        ]);
    }

    public function getValidation(Request $request)
    {
        $societies = societiesModel::where('login_tokens', $request->token)->first();
        $validation =  validationsModel::where('society_id', $societies->id)->first();
        if(empty($validation)){
            return response()->json([
                'validation' => null
            ]);
        }else{
            return response()->json([
                'validation' => new validationResource($validation)
            ]);
        }
    }
}
