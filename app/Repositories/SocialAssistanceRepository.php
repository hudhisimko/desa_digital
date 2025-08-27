<?php

namespace App\Repositories;

use App\Interfaces\SocialAssistanceRepositoryInterface;
use App\Models\SocialAssistance;
use Exception;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\search;

class SocialAssistanceRepository implements SocialAssistanceRepositoryInterface
{
    public function getAll(
        ?string $search,
        ?int $limit,
        bool $execute
    ) {
        $query = SocialAssistance::query();

if ($search) {
    $query->where(function ($q) use ($search) {
        $q->where('name', 'like', '%' . $search . '%')
          ->orWhere('category', 'like', '%' . $search . '%')
          ->orWhere('provider', 'like', '%' . $search . '%');
    });
}


        if ($limit) {
            $query->take($limit);
        }

        if ($execute) {
            return $query->get();
        }
        return $query;
    }


    public function getAllPaginated(
        ?string $search,
        ?int $rowPerPage
    ) {
        $query = $this->getAll(
            $search,
            $rowPerPage,
            false
        );
        return $query->paginate($rowPerPage);

    }

    public function getById(string $id)
    {
        $query = SocialAssistance::where('id', $id);

        return $query->first();
    }

    public function create(
        array $data
    ) {
        DB::beginTransaction();

        try {
            $socialAssistance = new SocialAssistance;
            $socialAssistance->thumbnail = $data['thumbnail']->store('assets/social-assistances','public');
            $socialAssistance->name = $data ['name'];
            $socialAssistance->category= $data ['category'];
            $socialAssistance->amount = $data ['amount'];
            $socialAssistance->provider = $data ['provider'];
            $socialAssistance->description = $data ['description'];
            $socialAssistance->is_available = $data ['is_available'];
            $socialAssistance->save();

            DB::commit();

            return $socialAssistance;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());

        }

    }

    public function update(
        string $id,
        array $data
        )
    {
        DB::beginTransaction();


        try {
            $socialAssistance = SocialAssistance::find($id);

            if (isset($data['thumbnail'])) {
                $socialAssistance->thumbnail = $data['thumbnail']->store('assets/social-assistances','public');
            }
            $socialAssistance->name = $data ['name'];
            $socialAssistance->category= $data ['category'];
            $socialAssistance->amount = $data ['amount'];
            $socialAssistance->provider = $data ['provider'];
            $socialAssistance->description = $data ['description'];
            $socialAssistance->is_available = $data ['is_available'];
            $socialAssistance->save();

            DB::commit();

            return $socialAssistance;
        } catch (\Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());

        }

    }

    public function delete(
        string $id
    ) {
        DB::beginTransaction();

        try {
            $socialAssistance = SocialAssistance::find($id);
            $socialAssistance->delete();
            DB::commit();

       } catch (\Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());

        }

    }

}
