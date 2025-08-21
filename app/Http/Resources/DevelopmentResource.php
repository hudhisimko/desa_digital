<?php

namespace App\Http\Resources;

use App\Models\FamilyMember;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DevelopmentResource extends JsonResource
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
            'thumbnail' => asset('storage/' . $this->thumbnail),
            'name' => $this->name,
            'description' => $this->description,
            'person_in_charge' => $this->person_in_charge,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'amount' => (float)(string)$this->amount,
            'status' => $this->status,
            'is_applied' => auth()->user()->hasRole('head_of_family') && $this->developmentApplicants()->whereHas('user', function ($query) {
                $query->where('id', auth()->user()->id);
            })->exists(),
            'development_applicants' => $this->whenLoaded('developmentApplicants', function () {
                return DevelopmentApplicantResource::collection($this->developmentApplicants->sortByDesc('created_at'));
            }),
        ];
    }
}
