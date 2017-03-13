<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
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
			$table->increments('id')->unsigned();
			$table->string('title',50);
			$table->text('content');
			$table->string('tags','200');
			$table->integer('user_id',10)->unsigned();
			$table->integer('bbschild_id',5)->unsigned();
			$table->integer('fansub_id',5)->unsigned();
			$table->integer('authority',3)->unsigned();
			$table->

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
