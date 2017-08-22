<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    //
    public function countrie() {
        return $this->belongsTo('App\Admin\Countrie');
    }
}
