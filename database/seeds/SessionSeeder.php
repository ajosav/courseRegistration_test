<?php

use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sessions')->delete();
        
        \DB::table('sessions')->insert(array(
            0 =>
            array(
                'id' => 1,
                'semester' => 'Harmattan'
            ),
            1 =>
            array(
                'id' => 2,
                'semester' => 'Rain'
            )
        ));
    }
}
