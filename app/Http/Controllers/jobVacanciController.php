<?php

namespace App\Http\Controllers;

use App\Http\Resources\jobVacanciResource;
use App\Models\job_vacancies;
use App\Models\societiesModel;
use App\Models\validationsModel;
use Illuminate\Http\Request;

class jobVacanciController extends Controller
{

    public function jobVacanci(Request $request)
    {
        $societies = societiesModel::where('login_tokens', $request->token)->first();
        $validation = validationsModel::where('society_id', $societies->id)->first();

        $jobVacanci = job_vacancies::where('job_category_id', $validation->job_category_id)->first();
        if(empty($jobVacanci)){
            return response()->json([
                'vacanci' => null
            ]);
        }else{
            return response()->json([
                'vacanci' => new jobVacanciResource($jobVacanci)
            ]);
        }
    }

    public function getVacanciById(Request $request, $id)
    {
        $jobVacanci = job_vacancies::find($id);
        if(empty($jobVacanci)){
            return response()->json([
                'vacanci' => null
            ]);
        }else{
            return response()->json([
                'vacanci' => new jobVacanciResource($jobVacanci)
            ]);
        }
    }

}
