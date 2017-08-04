<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersNullFeilds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('name')->nullable()->change();
			$table->string('last_name', 100)->nullable()->change();
			$table->string('username', 100)->nullable()->change();
			$table->string('facebook_token', 100)->nullable()->change();
			$table->datetime('subscription_end')->nullable()->change();
			$table->datetime('last_logout')->nullable()->change();
			$table->datetime('last_login')->nullable()->change();
			$table->text('note')->nullable()->change();
			$table->smallInteger('code')->nullable()->change();
			$table->smallInteger('expired')->nullable()->change();

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
    }
}
