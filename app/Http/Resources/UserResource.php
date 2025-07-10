<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
<<<<<<< HEAD
            'email' => $this->email
=======
            'email' => $this->email,

            'role' => 'admin'
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
        ];
    }
}
