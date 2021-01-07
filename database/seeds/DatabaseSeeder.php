<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(VillesTableSeeder::class);
        $this->call(CommuneTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BienTableSeeder::class);
    }
}
