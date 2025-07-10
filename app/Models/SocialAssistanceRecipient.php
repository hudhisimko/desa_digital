<?php

namespace App\Models;

use App\Traits\UUID;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAssistanceRecipient extends Model
{
<<<<<<< HEAD
    use SoftDeletes, UUID, HasFactory;
=======
    use SoftDeletes, UUID;
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb

    protected $fillable = [
        'social_assistance_id',
        'head_of_family_id',
        'bank',
        'amount',
        'reason',
<<<<<<< HEAD
=======
        'bank',
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
        'account_number',
        'proof',
        'status',
    ];

<<<<<<< HEAD
    public function scopeSearch($query, $search){
        return $query->whereHas('headOffamily', function ($query) use ($search){
            $query->whereHas('user', function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%');
                 $query->orWhere('email', 'like', '%'.$search.'%');
            });
        });
    }

   public function socialAssistance()
{
    return $this->belongsTo(SocialAssistance::class);
}

public function headOfFamily()
{
    return $this->belongsTo(HeadOfFamily::class);
}

=======
    public function socialAssistance()
    {
        return $this->belongsTo(SocialAssistance::class);
    }

    public function headOfFamily()
    {
        return $this->belongsTo(HeadOfFamily::class);
    }
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
}
