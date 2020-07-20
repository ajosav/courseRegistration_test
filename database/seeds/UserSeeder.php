<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('users')->insert(array(
            0 =>
            array(
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'option_id' => '3',
                'category_id' => 1,
                'email_verified_at' => now(),
                'password' => bcrypt('admin'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            )
        ));
        

    }
}
