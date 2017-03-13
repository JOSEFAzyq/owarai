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
			$table->increments('id');
			$table->string('title',50);
			$table->text('content');
			$table->string('tags','200');
			$table->integer('user_id',false,10);
			$table->integer('bbschild_id',false,5)->unsigned();
			$table->integer('fansub_id',false,5)->unsigned();
			$table->tinyInteger('authority',false,3)->unsigned();
			$table->integer('replay',false,10)->unsigned();
			$table->integer('thumb_up',false,10)->unsigned();
			$table->integer('thumb_down',false,10)->unsigned();
			$table->integer('view',false,10)->unsigned();
			$table->integer('pay_amount',false,10)->unsigned();
			$table->tinyInteger('is_top',false,2)->unsigned();
			$table->tinyInteger('is_elite',false,3)->unsigned();
			$table->tinyInteger('is_ori',false,2)->unsigned();
			$table->tinyInteger('is_pay',false,2)->unsigned();
			$table->tinyInteger('is_show',false,2)->unsigned();
			$table->tinyInteger('is_close',false,2)->unsigned();
			$table->dateTime('create_time');
			$table->dateTime('update_time');

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
