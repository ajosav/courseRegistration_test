<?php

use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('options')->delete();
        
        \DB::table('options')->insert(array(
            0 =>
            array(
                'department' => 'Computer Engineering',
                'created_at' => now()
            ),
            1 =>
            array(
                'department' => 'Computer Science With Math',
                'created_at' => now()
            ),
            2 =>
            array(
                'name' => 'Computer Science with Economics',
                'created_at' => now()
            ),
            3 =>
            array(
                'name' => 'General',
                'created_at' => now()
            ),
            4 =>
            array(
                'name' => 'with Math and Economics',
                'created_at' => now()
            ),
            5 =>
            array(
                'name' => 'with Engineering and Economics',
                'created_at' => now()
            ),
            6 =>
            array(
                'name' => 'with Engineering and Math',
                'created_at' => now()
            )
        ));
    }
}
