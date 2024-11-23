<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent_name' => $this->parent_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'birthday' => $this->birthday?->format('Y-m-d'),
            'amount' => $this->amount,
            'avatar' => $this->avatar,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}