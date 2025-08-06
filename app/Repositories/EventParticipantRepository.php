<?php

namespace App\Repositories;

use App\Interfaces\EventParticipantRepositoryInterface;
use App\Models\Event;
use App\Models\EventParticipant;
use Exception;
use Illuminate\Support\Facades\DB;

class EventParticipantRepository implements EventParticipantRepositoryInterface
{
    public function getAll(?string $search, ?int $limit, bool $execute)
    {
        $query = EventParticipant::with(['event', 'headOfFamily.user'])
            ->when($search, function ($q) use ($search) {
                $q->search($search);
            })
            ->orderBy('created_at', 'desc');

        if ($limit) {
            $query->take($limit);
        }

        return $execute ? $query->get() : $query;

    }

    public function getAllPaginated(?string $search, ?int $rowPerPage = 10)
    {
        return EventParticipant::with(['event', 'headOfFamily.user'])
            ->when($search, function ($q) use ($search) {
            $q->search($search);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($rowPerPage);
    }

    public function getById(string $id)
    {
        return EventParticipant::with(['event', 'headOfFamily.user'])
            ->where('id', $id)
            ->first();
    }

    public function create(array $data)
    {
        DB::beginTransaction();

        try {
            $event = Event::findOrFail($data['event_id']);

            $eventParticipant = new EventParticipant();
            $eventParticipant->event_id = $data['event_id'];
            $eventParticipant->head_of_family_id = $data['head_of_family_id'];
            $eventParticipant->quantity = $data['quantity'];
            $eventParticipant->total_price = $event->price * $data['quantity'];
            $eventParticipant->payment_status = 'pending';
            $eventParticipant->save();

            DB::commit();

            return $eventParticipant;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function update(string $id, array $data)
    {
        DB::beginTransaction();

        try {
            $event = Event::findOrFail($data['event_id']);
            $eventParticipant = EventParticipant::findOrFail($id);

            $eventParticipant->event_id = $data['event_id'];
            $eventParticipant->head_of_family_id = $data['head_of_family_id'];

            $eventParticipant->quantity = $data['quantity'] ?? $eventParticipant->quantity;

            $eventParticipant->total_price = $event->price * $eventParticipant->quantity;
            $eventParticipant->payment_status = $data['payment_status'];
            $eventParticipant->save();

            DB::commit();

            return $eventParticipant;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function delete(string $id)
    {
        DB::beginTransaction();

        try {
            $eventParticipant = EventParticipant::findOrFail($id);
            $eventParticipant->delete();

            DB::commit();

            return $eventParticipant;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
