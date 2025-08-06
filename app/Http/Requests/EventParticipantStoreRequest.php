<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventParticipantStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    return [
        'event_id' => 'required|uuid|exists:events,id',
        'head_of_family_id' => 'required|uuid|exists:head_of_families,id',
        'quantity' => 'required|integer|min:1',
    ];
    }


    public function attributes()
    {
        return [
             'event_id' => 'Event',
             'head_of_family' => 'Kepala Keluarga',
             'quantity' => 'Jumlah',
        ];
    }
}
