<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($productCategory) {
            $productCategory->products->each->delete();
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function path()
    {
        return '/admin/product-categories/' . $this->id;
    }
}
