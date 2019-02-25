<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OSVersion extends Model
{
    protected $table = 'os_versions';

    protected $guarded = [];

    public function path()
    {
        return '/admin/os-versions/' . $this->id;
    }
}
