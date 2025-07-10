<?php

namespace App\Repositories;

use App\Interfaces\HeadOfFamilyRepositoryInterface;
use App\Models\HeadOfFamily;
use Illuminate\Support\Facades\DB;

use Exception;

class HeadOfFamilyRepository implements HeadOfFamilyRepositoryInterface
{
    public function getAll(
<<<<<<< HEAD
        ?string $search, 
        ?int $limit, 
        bool $execute
    ) {
        $query = HeadOfFamily::where(function ($query) use ($search) {
            if ($search) { 
=======
        ?string $search,
        ?int $limit,
        bool $execute
    ) {
        $query = HeadOfFamily::where(function ($query) use ($search) {
            if ($search) {
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
                $query->search($search);
            }
        });

        $query->orderBy('created_at','desc');

        if ($limit) {
<<<<<<< HEAD
            //Mengambil beberapa berdasarkan limit
=======
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
            $query->take($limit);
        }

        if ($execute) {
<<<<<<< HEAD
            //Mengambil beberapa berdasarkan limit
=======
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
            return $query->get();
        }

        return $query;
    }

    public function getAllPaginated(
<<<<<<< HEAD
        ?string $search, 
=======
        ?string $search,
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
        ?int $rowPerPage
    ){
      $query = $this->getAll(
        $search,
        $rowPerPage,
        false
<<<<<<< HEAD
      );  
=======
      );
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb

      return $query->paginate($rowPerPage);
    }

    public function getById(string $id)
    {
        $query = HeadOfFamily::where('id', $id);

        return $query->first();
    }

    public function create(
        array $data
    ){
        DB::beginTransaction();

        try {
            $userRepository = new UserRepository;

            $user = $userRepository->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password']
            ]);

            $headOfFamily = new HeadOfFamily;
            $headOfFamily->user_id = $user->id;
            $headOfFamily->profile_picture = $data['profile_picture']->store('assets/head-of-families', 'public');
            $headOfFamily->identity_number = $data['identity_number'];
            $headOfFamily->gender = $data['gender'];
            $headOfFamily->date_of_birth = $data['date_of_birth'];
            $headOfFamily->phone_number = $data['phone_number'];
            $headOfFamily->occupation = $data['occupation'];
            $headOfFamily->marital_status = $data['marital_status'];
<<<<<<< HEAD
          
            $headOfFamily->save();
            
=======

            $headOfFamily->save();

>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
            DB::commit();
            return $headOfFamily;

        } catch (\Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }
    }

    public function update(
        string $id,
        array $data
    ){
        DB::beginTransaction();

        try {
            $headOfFamily = HeadOfFamily::find($id) ;
            if (isset($data['profile_picture'] )) {
                $headOfFamily->profile_picture = $data['profile_picture']->store('assets/head-of-families', 'public');
            }
            $headOfFamily->identity_number = $data['identity_number'];
            $headOfFamily->gender = $data['gender'];
            $headOfFamily->date_of_birth = $data['date_of_birth'];
            $headOfFamily->phone_number = $data['phone_number'];
            $headOfFamily->occupation = $data['occupation'];
            $headOfFamily->marital_status = $data['marital_status'];
            $headOfFamily->save();
<<<<<<< HEAD
            
=======

>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
            $userRepository = new UserRepository;

            $userRepository->update($headOfFamily->user_id, [
                'name' => $data['name'],
                'email' => $data['email'],
<<<<<<< HEAD
                'password' => isset( $data['password']) ? bcrypt($data['password']) : $headOfFamily->user->password 
=======
                'password' => isset( $data['password']) ? bcrypt($data['password']) : $headOfFamily->user->password
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
            ]);

            DB::commit();
            return $headOfFamily;

        } catch (\Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }
    }

    public function delete(string $id)
    {
        DB::beginTransaction();

        try {
            $headOfFamily = HeadOfFamily::find($id) ;

            $headOfFamily->delete();
<<<<<<< HEAD
            
=======

>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
            DB::commit();
            return $headOfFamily;

        } catch (\Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }
    }

<<<<<<< HEAD
}
=======
}
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
