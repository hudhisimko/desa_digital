<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventParticipantStoreRequest;
use App\Http\Requests\EventParticipantUpdateRequest;
use App\Http\Resources\EventParticipantResource;
use App\Http\Resources\PaginateResource;
use App\Interfaces\EventParticipantRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class EventParticipantController extends Controller implements HasMiddleware
{
    private EventParticipantRepositoryInterface $eventParticipantRepository;

    public function __construct(EventParticipantRepositoryInterface $eventParticipantRepository)
    {
        $this->eventParticipantRepository = $eventParticipantRepository;
    }

    public static function middleware()
    {
        return [
            new Middleware(PermissionMiddleware::using(['event-participant-list|event-participant-create|event-participant-edit|event-participant-delete']), only: ['index','getAllPaginated','show']),
            new Middleware(PermissionMiddleware::using(['event-participant-create']), only: ['store']),
            new middleware(PermissionMiddleware::using(['event-participant-edit']), only: ['update']),
            new middleware(PermissionMiddleware::using(['event-participant-delete']), only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
           try {
            $events = $this->eventParticipantRepository->getAll(
                $request->search,
                $request->limit,
                true
            );

            return ResponseHelper::jsonResponse(true,'Data Pendaftar Berhasil Diambil',EventParticipantResource::collection($events),200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function getAllPaginated(Request $request)
    {
        $search = $request->search;
        $rowPerPage = $request->row_per_page ?? 10;

        $data = $this->eventParticipantRepository->getAllPaginated($search, $rowPerPage);

        return ResponseHelper::jsonResponse(
            true,
            'Data Pendaftar Berhasil Diambil',
            new PaginateResource($data, EventParticipantResource::class),
            200
    );
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(EventParticipantStoreRequest $request)
    {
        $validated = $request->validated();

            try {
                $eventsParticipant = $this->eventParticipantRepository->create($validated);
                $eventsParticipant->load(['event', 'headOfFamily.user']);

             return ResponseHelper::jsonResponse(
                true,
                'Data Pendaftar Berhasil Disimpan',
                new EventParticipantResource($eventsParticipant),
                200
            );
        } catch (\Exception $e) {
        return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        try {
        $eventParticipant = $this->eventParticipantRepository->getById($id);

        if (!$eventParticipant) {
            return ResponseHelper::jsonResponse(false, 'Data Pendaftar Event Tidak Ditemukan', null, 404);
        }

        return ResponseHelper::jsonResponse(true, 'Data Pendaftar Event Berhasil Diambil', new EventParticipantResource($eventParticipant), 200);
         } catch (\Exception $e) {
        return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventParticipantUpdateRequest $request, string $id)
    {
        $request = $request->validated();

        try {
                $eventParticipant = $this->eventParticipantRepository->getById($id);
                if(!$eventParticipant){
                    return ResponseHelper::jsonResponse(false,'Data Pendaftar Event Tidak Ditemukan', null, 404);
                }

                $eventParticipant = $this->eventParticipantRepository->update($id, $request);

                return ResponseHelper::jsonResponse(true, 'Data Pendaftar Event Berhasil Diupdate', new EventParticipantResource($eventParticipant), 200);
            }   catch (\Exception $e) {
                return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
                $eventParticipant = $this->eventParticipantRepository->getById($id);
                if(!$eventParticipant){
                    return ResponseHelper::jsonResponse(false,'Data Pendaftar Event Tidak Ditemukan', null, 404);
                }

                $this->eventParticipantRepository->delete($id);

                return ResponseHelper::jsonResponse(true, 'Data Pendaftar Event Berhasil DiHapus', null, 200);
            }   catch (\Exception $e) {
                return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
            }
    }
}