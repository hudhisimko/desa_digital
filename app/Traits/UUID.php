<?php

namespace App\Traits;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait UUID
{
    protected static function boot() 
    {
        parent::boot();

        static::creating(function ($Model) {
            if ($Model->getkey() === null ) {
                $Model->setAttribute($Model->getKeyName(), Str::uuid()->toString()   );
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}