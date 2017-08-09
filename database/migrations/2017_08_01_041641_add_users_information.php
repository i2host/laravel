<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersInformation extends Migration
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
			$table->string('last_name', 100)->after('name');
			$table->string('username', 100)->after('last_name');
			$table->string('facebook_token', 100)->after('remember_token');
			$table->timestamp('subscription_end')->after('facebook_token');
			$table->timestamp('last_logout')->after('subscription_end');
			$table->timestamp('last_login')->after('last_logout'); 
			$table->text('note')->after('last_login');
			$table->smallInteger('type')->after('note');
			$table->smallInteger('points')->after('type');
			$table->smallInteger('code')->after('points');
			$table->smallInteger('expired')->after('code');
			$table->smallInteger('premium')->after('expired');
			$table->smallInteger('active')->after('premium');
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
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('last_name');
			$table->dropColumn('username');
			$table->dropColumn('facebook_token');
			$table->dropColumn('subscription_end');
			$table->dropColumn('last_logout');
			$table->dropColumn('last_login');
			$table->dropColumn('note');
			$table->dropColumn('type');
			$table->dropColumn('code');
			$table->dropColumn('expired');
			$table->dropColumn('premium');
			$table->dropColumn('active');
		});
    }
}
