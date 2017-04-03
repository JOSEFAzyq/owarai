<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Http\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\Http\Models\Article::class,'article',function (Faker\Generator $faker) {
	return[
		'title'=>$faker->word,
		'content'=>implode('',$faker->paragraphs(5)),
		'custom_tags'=>'综艺,番组,段子',
		'user_id'=>100,
		'bbschild_id'=>rand(10,15),
		'fansub_id'=>rand(10,15),
		'authority'=>0,
		'reply'=>rand(0,10000),
		'thumb_up'=>rand(0,100),
		'thumb_down'=>rand(0,100),
		'view'=>rand(0,10000),
	];
});

$factory->defineAs(App\Http\Models\Admin::class,'admin',function () {
    return[
        'user_name'=>'owaraiClub',
        'password'=>md5('josefa.owarai'),
    ];
});