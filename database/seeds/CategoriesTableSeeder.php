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
        		'title' => 'first_cat',
        		'description' => 'title',
        	]);

        Category::create([
        		'title' => 'second_cat',
        		'description' => 'title',
        	]);

        Category::create([
        		'title' => 'third_cat',
        		'description' => 'title',
        	]);
    }
}
