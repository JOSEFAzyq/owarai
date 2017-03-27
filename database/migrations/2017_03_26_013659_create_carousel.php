<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarousel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel',function(Blueprint $table){
            $table->increments('id');
            $table->string('name',50)->default('');
            $table->string('url',200)->default('');
            $table->string('order',200)->default('')->comment('顺序，仅对使用中的有效');
            $table->enum('status',[1,2])->default(2)->comment('1 使用中 2 未使用');
            $table->enum('type',[1,2])->default(1)->comment('1 首页轮播 2 其他轮播 ');
            $table->string('author',60)->default('')->comment('发布人');
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
        Schema::drop('carousel');
    }
}
