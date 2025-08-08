<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialAssistanceStoreRequest;
use App\Http\Requests\SocialAssistanceUpdateRequest;
use App\Http\Resources\PaginateResource;
use App\Http\Resources\SocialAssistanceResource;
use App\Interfaces\SocialAssistanceRepositoryInterface;
use App\Models\SocialAssistance;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class SocialAssistanceController extends Controller implements HasMiddleware
{
    private SocialAssistanceRepositoryInterface $socialAssistanceRepository;

    public function __construct(SocialAssistanceRepositoryInterface $socialAssistanceRepository)
    {
        $this->socialAssistanceRepository = $socialAssistanceRepository;

    }

    public static function middleware()
    {
        return [
            new middleware(PermissionMiddleware::using(['social-assistance-list|social-assistance-create|social-assistance-edit|social-assistance-delete']), only: ['index','getAllPaginated','show']),
            new Middleware(PermissionMiddleware::using(['social-assistance-create']), only: ['store']),
            new middleware(PermissionMiddleware::using(['social-assistance-edit']), only: ['update']),
            new middleware(PermissionMiddleware::using(['social-assistance-delete']), only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        try {
            $socialAssistances = $this->socialAssistanceRepository->getAll(
                $request->search,
                $request->limit,
                true
            );
            return ResponseHelper::jsonResponse(true, 'Data Bantuan Sosial Berhasil Diambil', SocialAssistanceResource::collection($socialAssistances),200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage() , null, 500);
        }
    }

    public function getAllPaginated(Request $request)
    {
        $request = $request->validate([
            'search' => 'nullable|string',
            'row_per_page' => 'required|integer'
        ]);

        try {
            $socialAssistances = $this->socialAssistanceRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page']
            );

            return ResponseHelper::jsonResponse(true, 'Data Bantuan Sosial Berhasil Diambil', PaginateResource::make($socialAssistances, SocialAssistanceResource::class),200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage() , null, 500);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialAssistanceStoreRequest $request)
    {
        $request = $request->validated();
        try {
            $socialAssistances = $this->socialAssistanceRepository->create($request);
            return ResponseHelper::jsonResponse(true, 'Data Bantuan Sosial Berhasil Ditambahkan', new SocialAssistanceResource($socialAssistances),200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false,$e->getMessage(), null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $socialAssistances = $this->socialAssistanceRepository->getById($id);

            if (!$socialAssistances) {
                return ResponseHelper::jsonResponse(false, 'Data Bantuan Sosial Tidak Ditemukan', null, 404);
            }

            return ResponseHelper::jsonResponse(true, 'Data Bantuan Sosial Berhasil Diambil', new SocialAssistanceResource($socialAssistances),200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(),null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialAssistanceUpdateRequest $request, string $id)
    {
        $request = $request->validated();

        try {
            $socialAssistances = $this->socialAssistanceRepository->getById($id);

            if (!$socialAssistances) {

                return ResponseHelper::jsonResponse(false, 'Data Bantuan Social Tidak Ditemukan', null, 404);
            }

            $socialAssistances = $this->socialAssistanceRepository->update(
                $id,
                $request
            );

            return ResponseHelper::jsonResponse(true, 'Data Bantuan Sosial Berhasil Diupdate', new SocialAssistanceResource($socialAssistances),200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try {
            $socialAssistances = $this->socialAssistanceRepository->getById($id);

            if (!$socialAssistances) {

                return ResponseHelper::jsonResponse(false, 'Data Bantuan Social Tidak Ditemukan', null, 404);
            }

            $socialAssistances = $this->socialAssistanceRepository->delete($id);

            return ResponseHelper::jsonResponse(true, 'Data Bantuan Sosial Berhasil Dihapus', null,200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(),null, 500);
        }
    }
}
