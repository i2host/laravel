<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Devices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vpnusername',240)->unique();
            $table->string('vpnpassword',240);
            $table->macAddress('mac')->unique();
            $table->string('os_version');
            $table->string('type');
            $table->string('app_version');
            $table->string('model');
            $table->datetime('last_connect')->nullable();
            $table->datetime('last_disconnect')->nullable();
            $table->datetime('last_login')->nullable();
            $table->datetime('last_logout')->nullable();
            $table->string('pin');
            $table->longText('note')->nullable();
            $table->tinyInteger('online');
			$table->tinyInteger('active');
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
        Schema::dropIfExists('devices');
    }
}