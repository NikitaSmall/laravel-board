<?php

use Illuminate\Database\Seeder;
use App\Category;

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
        		'title' => 'cats',
        		'description' => 'Angry cats for your children.',
        	]);

        Category::create([
        		'title' => 'dogs',
        		'description' => 'Sad dogs.',
        	]);

        Category::create([
        		'title' => 'parrots',
        		'description' => 'Dead parrots.',
        	]);
    }
}
