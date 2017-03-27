<?php

use Illuminate\Database\Seeder;

class OwaraiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Http\Models\Article::class,'article', 50)->create();
    }
}
