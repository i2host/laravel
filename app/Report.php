<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    //

    public static function sessionlogs() {
        $sessionlogs = DB::table('sessionlogs')
                        ->orderBy('sessionlogs.updated_at', 'desc')
                        ->leftJoin('servers', 'sessionlogs.server_ip', '=', 'servers.server_ip')
                        ->leftJoin('devices', 'sessionlogs.device_id', '=', 'devices.id')
                        ->get();
        return $sessionlogs;
    }

}
