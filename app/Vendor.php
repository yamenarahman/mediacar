<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $guarded = [];

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
