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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function fileName()
    {
        return basename($this->url);
    }

    public function path()
    {
        return $this->product->path() . '/driver-kits/' . $this->id;
    }
}
