<?php

use Illuminate\Database\Seeder;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('parts')->delete();
        
        \DB::table('parts')->insert(array(
            0 =>
            array(
                'id' => 1,
                'level' => '1'
            ),
            1 =>
            array(
                'id' => 2,
                'level' => '2'
            ),
            2 =>
            array(
                'id' => 3,
                'level' => '3'
            ),
            3 =>
            array(
                'id' => 4,
                'level' => '4'
            ),
            4 =>
            array(
                'id' => 5,
                'level' => '5'
            )
        ));
    }
}
