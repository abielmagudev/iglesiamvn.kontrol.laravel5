<?php

use Illuminate\Database\Seeder;

class MemberMinistryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       # $positions = ['servidor', 'lider', 'sublider', 'asistente'];

       for($i = 0; $i <= 15; $i++)
       {
           DB::table('member_ministry')->insert([
               'member_id' => rand(1, 10),
               'ministry_id' => rand(1, 7),
               'position' => rand(0,3),
               'description' => 'Description position',
           ]);
       }
    }
}
 