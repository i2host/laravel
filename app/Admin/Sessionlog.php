<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Sessionlog extends Model
{

    public function device()
    {
        return $this->belongsTo('App\Admin\Device');
    }

    public function server()
    {
        return $this->belongsTo('App\Admin\Server','server_ip','server_ip');
    }

}
