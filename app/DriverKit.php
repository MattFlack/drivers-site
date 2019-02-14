<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverKit extends Model
{
    protected $guarded = [];

    public function osVersion()
    {
        return $this->belongsTo(OSVersion::class);
    }

    public function fileName()
    {
        return basename($this->url);
    }
}
