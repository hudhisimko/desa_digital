<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAssistance extends Model
{
    use SoftDeletes,UUID;

    protected $fillable = [
        'thumbnail',
        'name',
        'category',
        'amount',
        'provider',
        'description',
        'is_available',
    ];
<<<<<<< HEAD
=======

    protected $casts = [
        'is_available' => 'boolean'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%' )
            ->orWhere('provider', 'like', '%' . $search . '%')
            ->orWhere('amount', 'like', '%' . $search . '%');
    }

    public function socialAssistanceRecipients()
    {
        return $this->hasMany(SocialAssistanceRecipient::class);
    }
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
}
