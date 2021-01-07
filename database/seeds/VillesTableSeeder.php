<?php

use App\Ville;
use Illuminate\Database\Seeder;

class VillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ville::create([
            'name' => 'Kinshasa',
            'slug' => 'kinshasa',
        ]);

        Ville::create([
            'name' => 'Bandundu',
            'slug' => 'bandundu',
        ]);

        Ville::create([
            'name' => 'Matadi',
            'slug' => 'matadi',
        ]);

        Ville::create([
            'name' => 'Lubumbashi',
            'slug' => 'lubumbashi',
        ]);

    }
}
