<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Resources\ProfileResource;
use App\Interfaces\ProfileRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class ProfileController extends Controller implements HasMiddleware
{
    private ProfileRepositoryInterface $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public static function middleware()
    {
        return [
            new Middleware(PermissionMiddleware::using(['profile-list|profile-create|profile-edit|profile-delete']), only: ['index','getAllPaginated','show']),
            new Middleware(PermissionMiddleware::using(['profile-create']), only: ['store']),
            new middleware(PermissionMiddleware::using(['profile-edit']), only: ['update']),
            new middleware(PermissionMiddleware::using(['profile-delete']), only: ['destroy']),
        ];
    }

    public function index()
    {
        try {
            $profile = $this->profileRepository->get();

            if (!$profile) {
                return ResponseHelper::jsonResponse(false,"Data Profile Tidak Ada",null,404);
            }

            return ResponseHelper::jsonResponse(true,'Profil Berhasil Diambil',new ProfileResource($profile),200);
        } catch (\Exception $e) {
                return ResponseHelper::jsonResponse(false,$e->getMessage(),null,500);
        }
    }
    
    public function store(ProfileStoreRequest $request)
    {
        $request = $request->validated();
        try {
            $profile = $this->profileRepository->create($request);


            return ResponseHelper::jsonResponse(true,'Data profil berhasil ditambahkan',new ProfileResource($profile),201);
        } catch (\Exception $e) {
                return ResponseHelper::jsonResponse(false,$e->getMessage(),null,500);
        }
    }
    public function update(ProfileUpdateRequest $request)
    {
        $request = $request->validated();
        try {
            $profile = $this->profileRepository->update($request);


            return ResponseHelper::jsonResponse(true,'Data profil berhasil diubah',new ProfileResource($profile),200);
        } catch (\Exception $e) {
                return ResponseHelper::jsonResponse(false,$e->getMessage(),null,500);
        }
    }

}