<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMember extends Model
{
    use SoftDeletes, UUID;

    protected $fillable = [
            'head_of_family_id',
            'user_id',
            'profile_picture',
            'identity_number',
            'gender',
            'date_of_birth',
            'phone_number',
            'occupation',
            'marital_status',
<<<<<<< HEAD
    ];

=======
            'relation'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->whereHas('user', function($query) use ($search)  {
            $query->where('name', 'like', '%' . $search . '%' )
            ->orWhere('email', 'like', '%' . $search . '%' );
        })->orWhere('phone_number', 'like', '%' . $search . '%' )
            ->orWhere('identity_number', 'like', '%' . $search . '%' );;
    }
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
    public function headOfFamily()
    {
        return $this->belongsTo(headOfFamily::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
