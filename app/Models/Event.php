<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes,UUID;
=======
use Illuminate\Database\Eloquent\SoftDeletes; // Perbaiki 'SoftDeleges' menjadi 'SoftDeletes'

class Event extends Model
{
    use SoftDeletes, UUID;
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb

    protected $fillable = [
        'thumbnail',
        'name',
        'description',
        'price',
        'date',
        'time',
<<<<<<< HEAD
        'is_active',
    ];
=======
        'is_active'
    ];
    protected $casts = [
        'price' => 'decimal:2'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%');
    }
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb

    public function eventParticipants()
    {
        return $this->hasMany(EventParticipant::class);
    }
<<<<<<< HEAD

    public function headOfFamily()
    {
        return $this->belongsTo(HeadOfFamily::class);
    }
=======
>>>>>>> 851a6ebf494b04cd710262de18112042ddbb9bfb
}
