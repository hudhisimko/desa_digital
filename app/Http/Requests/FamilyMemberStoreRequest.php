<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyMemberStoreRequest extends FormRequest
{
    public function rules(): array
{
    return [
        'name' => 'required|string',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:8',
        'head_of_family_id' => 'required|exists:head_of_families,id',
        'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'identity_number' => 'required|integer',
        'gender' => 'required|string|in:male,female',
        'date_of_birth' => 'required|date',
        'phone_number' => 'required|string',
        'occupation' => 'required|string',
        'marital_status' => 'required|string|in:married,single',
        'relation' => 'required|string|in:wife,child,husband'
    ];
}

public function attributes()
{
    return [
        'name' => 'Nama',
        'email' => 'Email',
        'password' => 'Kata Sandi',
        'head_of_family_id' => 'Kepala Keluarga',
        'profile_picture' => 'Foto Profile',
        'identity_number' => 'Nomor Identitas',
        'gender' => 'Jenis Kelamin',
        'phone_number' => 'Nomor Telepon',
        'occupation' => 'Pekerjaan',
        'marital_status' => 'Status Perkawinan pilih salah satu married,single',
        'relation' => 'hubungan'
    ];
}


}
