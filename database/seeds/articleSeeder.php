<?php

use Illuminate\Database\Seeder;

class articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory(App\Http\Models\Article::class,'article', 50)->create()->each(function($u) {

		});

		/*DB::table('users')->insert([
			'name' => str_random(10),
			'email' => str_random(10).'@gmail.com',
			'password' => bcrypt('secret'),
		]);*/
    }
}
