<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OSVersion extends Model
{
    protected $table = 'os_versions';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($osVersion) {
            $osVersion->driverKits->each->delete();
        });
    }

    public function path()
    {
        return '/admin/os-versions/' . $this->id;
    }

    public function driverKits()
    {
        return $this->hasMany(DriverKit::class, 'os_version_id');
    }
}
