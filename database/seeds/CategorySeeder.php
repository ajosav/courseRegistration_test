<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'admin'
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'student'
            )
        ));
    }
}
