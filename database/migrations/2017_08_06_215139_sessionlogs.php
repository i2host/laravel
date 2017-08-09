<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sessionlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('sessionlogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('device_id');
            $table->ipAddress('client_ip');
            $table->integer('client_port');
            $table->ipAddress('vpn_ip');
            $table->integer('vpn_port');
            $table->ipAddress('server_ip');
            $table->timestamp('connect_time');
            $table->timestamp('disconnect_time');
            $table->bigInteger('recived_data');
            $table->bigInteger('sent_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('sessionlogs');
    }
}
