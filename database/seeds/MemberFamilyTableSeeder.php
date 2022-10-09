<?php

use Illuminate\Database\Seeder;

class MemberFamilyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i = 0; $i <= 50; $i++)
       {
           DB::table('member_family')->insert([
               'member_id' => rand(1, 50),
               'family_id' => rand(1, 50),
               'member_relationship' => 'Has family',
               'family_relationship' => 'His family',
           ]);
       }
    }
}
