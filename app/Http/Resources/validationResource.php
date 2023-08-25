<?php

namespace App\Http\Resources;

use App\Models\job_categories;
use App\Models\validatorsModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class validationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

       return [
         'id'=>$this->id,
         'category'=> job_categories::find($this->job_category_id),
         'validator'=> validatorsModel::find($this->validator_id),
         'status'=>$this->status,
         'work_experience'=>$this->work_experience,
         'job_position'=>$this->job_position,
         'reason_accepted'=>$this->reason_accepted,
         'validator_notes'=> 'siap kerja',
       ];
    }
}
