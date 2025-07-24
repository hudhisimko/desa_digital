<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\DevelopmentApplicantRequest;
use App\Http\Requests\DevelopmentApplicantUpdateRequest;
use App\Http\Resources\DevelopmentApplicantResource;
use App\Http\Resources\PaginateResource;
use App\Interfaces\DevelopmentApplicantRepositoryInterface;
use App\Models\DevelopmentApplicant;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class DevelopmentApplicantController extends Controller 
{
    private DevelopmentApplicantRepositoryInterface $developmentApplicantRepository;

    public function __construct(DevelopmentApplicantRepositoryInterface $developmentApplicantRepository)
    {
        $this->developmentApplicantRepository = $developmentApplicantRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
           $developmentApplicant = $this->developmentApplicantRepository->getAll(
            $request->search,
            $request->limit,
            true
           );
           return ResponseHelper::jsonResponse(true, 'Data pendaftaran pembangunan berhasil di ambil', DevelopmentApplicantResource::collection($developmentApplicant), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(),null, 500);
        }

}





    public function getAllPaginated(Request $request)
    {
        $request = $request->validate([
            'search' => 'nullable|string',
            'row_per_page' => 'required|integer'
        ]);
        try {
           $developmentApplicant = $this->developmentApplicantRepository->getAllPaginated(
             $request['search'] ?? null,
             $request['row_per_page']
           );
           return ResponseHelper::jsonResponse(true, 'Data pendaftaran pembangunan berhasil di ambil',PaginateResource::make($developmentApplicant,DevelopmentApplicantResource::class), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(),null, 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(DevelopmentApplicantRequest $request)
    {
        $request = $request->validated();

        try {
            $developmentApplicant = $this->developmentApplicantRepository->create($request);

            return ResponseHelper::jsonResponse(true, 'data pendaftar pembangunan berhasil di buat', new DevelopmentApplicantResource($developmentApplicant), 201);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(),null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         try {
            $developmentApplicant = $this->developmentApplicantRepository->getById($id);

            if(!$developmentApplicant) {
                return ResponseHelper::jsonResponse(false, 'Data pendaftaran tidak ditemukan', null, 401);
            }

            return ResponseHelper::jsonResponse(true, 'data pendaftar pembangunan berhasil di ambil', new DevelopmentApplicantResource($developmentApplicant), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(),null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DevelopmentApplicantUpdateRequest $request, string $id)
    {
         $request = $request->validated();

         try {
            $developmentApplicant = $this->developmentApplicantRepository->getById($id);

            if(!$developmentApplicant) {
                return ResponseHelper::jsonResponse(false, 'Data pendaftaran tidak ditemukan', null, 401);
            }

            $developmentApplicant = $this->developmentApplicantRepository->update($id, $request);

            return ResponseHelper::jsonResponse(true, 'data pendaftar pembangunan berhasil diupdate', new DevelopmentApplicantResource($developmentApplicant), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(),null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try {
            $developmentApplicant = $this->developmentApplicantRepository->getById($id);

            if(!$developmentApplicant) {
                return ResponseHelper::jsonResponse(false, 'Data pendaftaran tidak ditemukan', null, 401);
            }

           $this->developmentApplicantRepository->delete($id);

            return ResponseHelper::jsonResponse(true, 'data pendaftar pembangunan berhasil dihapus', null, 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(),null, 500);
        }
    }
}
