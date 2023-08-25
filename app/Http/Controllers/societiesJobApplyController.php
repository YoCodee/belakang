<?php

namespace App\Http\Controllers;

use App\Http\Resources\jobApplyResource;
use App\Http\Resources\societiesResource;
use App\Models\job_apply_societies;
use App\Models\job_vacancies;
use App\Models\societiesModel;
use App\Models\validationsModel;
use Illuminate\Http\Request;

class societiesJobApplyController extends Controller
{
    public function JobApply(Request $request)
    {
        $societies = societiesModel::where('login_tokens', $request->token)->first();
        if(empty($request->vacancy_id) || empty($request->positions)){
            return response()->json([
                "message" => 'invalid field',
                "errors" => [
                    "vacancy_id" [
                       "The vacancy id field is required."
                    ],
                    "positions " [
                       "The position field is required."
                    ]
                 ]

            ]);

        }

        $validation = validationsModel::where("society_id", $societies->id)->first();
        if($validation->status == "pending"){
            return response()->json([
                'message' => 'Your Data validator must be accepted by validator before'
            ]);
        }

        $jobApplySocieties = job_apply_societies::where('society_id', $societies->id)->get();
        if(count($jobApplySocieties) == 2){
            return response()->json([
                'message' => 'Application for a job can only be once'
            ]);
        }

        $jobApply = new job_apply_societies();
        $jobApply->date = date('y-m-d');
        $jobApply->notes = $request->notes;
        $jobApply->job_vacancy_id = $request->vacancy_id;
        $jobApply->society_id = $societies->id;
        $jobApply->save();
        return response()->json([
            'message' => 'request data succesfully'
        ]);


    }

    public function getJobApply(Request $request)
    {
        $societies = societiesModel::where('login_tokens', $request->token)->first();
        $validation = validationsModel::where('society_id', $societies->id)->first();
        $jobApply = job_apply_societies::where('society_id', $societies->id)->first();
        if(empty($jobApply)){
            return response()->json([
                'vacnaci' => null
            ]);
        }

        $vacancies = job_vacancies::where('id', $jobApply->job_vacancy_id)->first();
        return response()->json([
            "vacanci" => new jobApplyResource($vacancies)
        ]);
    }
}
