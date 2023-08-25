<?php

namespace App\Http\Resources;

use App\Models\available_positions;
use App\Models\job_apply_societies;
use App\Models\job_categories;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class jobApplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
        'id' => $this->id,
        'date' => date('y-m-d'),
        'category' => job_categories::find($this->job_category_id),
        'company'=> $this->company,
        'address'=> $this->address,
        'description'=> $this->description,
        'positions'=> [
            'apply_status' => 'accepted',
            'notes' => 'i want this positions',
            'positions' => 'web Developer'
        ]
        ];
    }
}
