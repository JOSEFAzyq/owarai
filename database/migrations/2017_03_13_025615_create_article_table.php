<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('article',function(Blueprint $table){
			$table->increments('id');
			$table->string('title',50)->default('');
            $table->string('user_name',30)->default('');
			$table->text('content');
			$table->integer('tag_id',false,5)->default(0);
			$table->string('custom_tags','200')->default('');
			$table->integer('user_id',false,10);
			$table->integer('bbschild_id',false,5)->unsigned()->default(0);
			$table->integer('fansub_id',false,5)->unsigned()->default(0);
			$table->tinyInteger('authority',false,3)->unsigned()->default(0);
			$table->integer('reply',false,10)->unsigned()->default(0);
			$table->integer('thumb_up',false,10)->unsigned()->default(0);
			$table->integer('thumb_down',false,10)->unsigned()->default(0);
			$table->integer('view',false,10)->unsigned()->default(0);
			$table->integer('pay_amount',false,10)->unsigned()->default(0);
            $table->integer('ranked',false,5)->unsigned()->default(0);
			$table->tinyInteger('is_home',false,2)->unsigned()->default(0);
			$table->tinyInteger('is_top',false,2)->unsigned()->default(0);
			$table->tinyInteger('is_elite',false,3)->unsigned()->default(0);
			$table->tinyInteger('is_ori',false,2)->unsigned()->default(0);
			$table->tinyInteger('is_pay',false,2)->unsigned()->default(0);
			$table->tinyInteger('is_show',false,2)->unsigned()->default(1);
			$table->tinyInteger('is_close',false,2)->unsigned()->default(0);
			$table->string('author',100)->default('');
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
