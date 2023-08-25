<?php

namespace App\Http\Resources;

use App\Models\regionalModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class societiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        return [
            'name' => $this->name,
            'born_date' => $this->born_date,
            'gender' => $this->gender,
            'address' => $this->address,
            'token' => $this->login_tokens,
            'regional' => regionalModel::find($this->id),
        ];
    }
}
