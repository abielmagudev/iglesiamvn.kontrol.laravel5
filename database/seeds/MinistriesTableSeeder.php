<?php

use Illuminate\Database\Seeder;

class MinistriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Ministry::class, 7)->create();
    }
}
