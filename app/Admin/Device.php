<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany('App\Admin\User');
    }
}
