<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bios extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function path()
    {
        return $this->product->path() . '/bios/' . $this->id;
    }
}
