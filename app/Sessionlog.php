<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessionlog extends Model
{

    public function device()
    {
        return $this->belongsTo('App\Device');
    }

    public function server()
    {
        return $this->belongsTo('App\Server','server_ip','server_ip');
    }

}
