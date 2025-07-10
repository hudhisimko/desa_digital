<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocialAssistanceResource extends JsonResource
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
<<<<<<< HEAD
            'type' => $this->type,
            'description' => $this->description,
            'amount' => $this->amount,
=======
            'thumbnail' => $this->thumbnail,
            'name' => $this->name,
            'category' => $this->category,
            'amount' => $this->amount,
            'provider' => $this->provider,
            'description' => $this->description,
            'is_available' => (bool) $this->is_available,

>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
        ];
    }
}
