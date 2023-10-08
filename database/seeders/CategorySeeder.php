<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name' => 'ZAPATILLAS',
        	'image' => 'https://dummyimage.com/200x150/5c5e76/0011ff'
        ]);
        Category::create([
        	'name' => 'TENIS DEPORTIVOS',
        	'image' => 'https://dummyimage.com/200x150/5c5e76/0011ff'
        ]);
        Category::create([
        	'name' => 'BOTINES DEPORTIVOS',
        	'image' => 'https://dummyimage.com/200x150/5c5e76/0011ff'
        ]);
        Category::create([
        	'name' => 'SANDALIAS',
        	'image' => 'https://dummyimage.com/200x150/5c5e76/0011ff'
        ]);

    }
}
