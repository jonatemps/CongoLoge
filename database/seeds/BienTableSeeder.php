<?php

use App\Bien;
use Illuminate\Database\Seeder;

class BienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker= Faker\Factory::create('fr_FR');

        for ($i=0; $i < 50; $i++) {
           Bien::create([
               'title'=> $faker->sentence(3),
               'commune_id'=>rand(1, 50),
               'slug'=> $faker->slug(),
               'description'=> $faker->text,
               'chambre'=>rand(1, 4),
               'cuisine'=>rand(1, 4),
               'garage'=>rand(1, 4),
               'baignoire'=>rand(1, 4),
               'dimension'=> '10 x 10',
               'adresse'=>$faker->address,
               'status'=>'PUBLIE',
               'En_vedette'=>rand(0, 1),
               'destination'=>$faker->randomElement($array = array ('VENTE','LOCATION')),
               'price'=> $faker->numberBetween(30,200),
               'image' => 'img/propertie/3.jpg'
           ])->categories()->attach([
                rand(1, 4),
                rand(1, 4)
           ]);
        }
    }
}
