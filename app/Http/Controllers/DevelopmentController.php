<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\DevelopmentUpdateRequest;
use App\Http\Resources\DevelopmentResource;
use App\Http\Resources\PaginateResource;
use App\Interfaces\DevelopmentRepositoryInterface;
use App\Models\Development;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;

class DevelopmentController extends Controller
{

    private DevelopmentRepositoryInterface $developmentRepository;

    public function __construct(DevelopmentRepositoryInterface $developmentRepository)
     {
        $this->developmentRepository = $developmentRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $development = $this->developmentRepository->getAll(
                $request->search,
                $request->limit,
                true
            );

            return ResponseHelper::jsonResponse(true,'Data Pembangunan Berhasil Diambil',DevelopmentResource::collection($development),200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function getAllPaginated(Request $request)
    {
        $request = $request->validate([
            'search'        => 'nullable|string',
            'row_per_page'  => 'required|integer'
        ]);

        try {
            $development = $this->developmentRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page'],
            );

            return ResponseHelper::jsonResponse(true,'Data Event Berhasil Diambil',PaginateResource::make($development, DevelopmentResource::class),200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request = $request->validate([
        'thumbnail'         => 'required|image|mimes:png,jpg',
        'name'              => 'required|string|max:255',
        'description'       => 'nullable|string',
        'person_in_charge'  => 'required|string|max:255',
        'start_date'        => 'required|date',
        'end_date'          => 'nullable|date|after_or_equal:start_date',
        'amount'            => 'nullable|numeric|min:0',
        'status'            => 'nullable|string',

        ]);

        try {
            $development = $this->developmentRepository->create($request);

            return ResponseHelper::jsonResponse(true, 'Data Pembagian Berhasil Diambil', new DevelopmentResource($development), 201);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $development = Development::find($id);

         try {
            $development = $this->developmentRepository->getById($id);

            if (!$development) {
                return ResponseHelper::jsonResponse(false, 'Data Pembangunan Tidak Ditemukan', null , 404);
            }

            return ResponseHelper::jsonResponse(true, 'Data Pembangunan Berhasil Diambil', new DevelopmentResource($development), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DevelopmentUpdateRequest $request, string $id)
    {
        $development = Development::find($id);

         try {
            $development = $this->developmentRepository->getById($id);

            if (!$development) {
                return ResponseHelper::jsonResponse(false, 'Data Pembangunan Tidak Ditemukan', null , 404);
            }

            $development = $this->developmentRepository->update($id, $request->validated());

            return ResponseHelper::jsonResponse(true, 'Data Pembangunan Berhasil Diupdate', new DevelopmentResource($development), 200);
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
            $development = $this->developmentRepository->getById($id);

            if (!$development) {
                return ResponseHelper::jsonResponse(false, 'Data Pembangunan Tidak Ditemukan', null , 404);
            }

            $this->developmentRepository->delete($id);

            return ResponseHelper::jsonResponse(true, 'Data Pembangunan Berhasil Dihapus', null, 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }
}
