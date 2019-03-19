<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use TeamTNT\TNTSearch\Indexer\TNTIndexer;


class Product extends Model
{
    use Searchable;

    protected $guarded = [];

    /**
     * The relationships to always eager-load.
     *
     * @var array
     */
//    protected $with = ['category'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            $product->driverKits->each->delete();
            $product->bioses->each->delete();
        });
    }

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

    public function bioses()
    {
        return $this->hasMany(Bios::class);
    }

    public function path() {
        return '/admin/products/' . $this->id;
    }

    public function toSearchableArray() {
        $product = $this->toArray();

        $product['category_name'] = $this->category->name;
        $product['path'] = $this->path();

        return $product;
    }

//    /**
//     * Get the indexable data array for the Product (For TNTSearch - using Angolia at the moment).
//     *
//     * @return array
//     */
//    public function toSearchableArray()
//    {
//        $array = [
//            'id' => $this->id,
//            'name' => $this->name,
//        ];
//
//        $array['nameNgrams'] = utf8_encode((new TNTIndexer)->buildTrigrams($this->name));
//
//        return $array;
//    }
}
