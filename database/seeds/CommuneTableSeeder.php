<?php

use App\Commune;
use Illuminate\Database\Seeder;

class CommuneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();

        for ($i=0; $i < 50; $i++) {
           Commune::create([
               'ville_id' =>rand(1,3),
               'name'=> $faker->city,
               'slug'=> $faker->city
           ]);
        }
    }
}
