<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminBbschildFansubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('admin',function(Blueprint $table){
			$table->increments('id');
			$table->string('user_name',20);
			$table->string('password',32);
			$table->Integer('bbs_child_id',false,5);
			$table->Integer('fansub_id',false,5);
			$table->string('sensitive_auth');
			$table->string('character',30);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});

		Schema::create('fansub',function(Blueprint $table){
			$table->increments('id');
			$table->string('name',50);
			$table->dateTime('create_time');
			$table->dateTime('update_time');
		});

		Schema::create('bbs_child',function(Blueprint $table){
			$table->increments('id');
			$table->string('name',50);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
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
