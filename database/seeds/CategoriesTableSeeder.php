<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Appartement',
            'slug'=>'appartement'
        ]);

        Category::create([
            'name'=>'Immeuble',
            'slug'=>'immeuble'
        ]);

        Category::create([
            'name'=>'Terrain',
            'slug'=>'terrain'
        ]);

        Category::create([
            'name'=>'Bureaux',
            'slug'=>'bureaux'
        ]);
    }
}
