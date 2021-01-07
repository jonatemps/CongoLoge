<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => "Doe$i",
                'firstname' => "john$i",
                'phone' => 813134572,
                'email' => "John$i@doe.com",
                'password' => bcrypt('12345678')
            ]);
        }
    }
}
