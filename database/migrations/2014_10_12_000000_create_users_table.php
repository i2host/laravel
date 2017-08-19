<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('username', 100)->nullable();
            $table->string('email','60')->unique();
            $table->string('password');
            $table->rememberToken();
			$table->string('facebook_token', 100)->nullable();
			$table->timestamp('subscription_end')->nullable();
			$table->timestamp('last_logout')->nullable();
			$table->timestamp('last_login')->nullable(); 
			$table->smallInteger('type');
			$table->smallInteger('points');
			$table->smallInteger('code')->nullable();
			$table->smallInteger('expired')->nullable();
			$table->longText('note')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
			$table->smallInteger('premium');			
			$table->smallInteger('active');
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
        Schema::dropIfExists('users');
    }
}
