<?php

use App\Category;
use App\Group;
use App\Option;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(ElectivesTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(PartSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(UserSeeder::class);

    }
}
