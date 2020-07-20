<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('groups')->delete();
        
        \DB::table('groups')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'SE'
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'RE'
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'C'
            )
        ));
    }
}
