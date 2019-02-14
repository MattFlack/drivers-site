<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function creator() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function driverKits()
    {
        return $this->hasMany(DriverKit::class);
    }

    public function path() {
        return '/admin/products/' . $this->id;
    }
}
