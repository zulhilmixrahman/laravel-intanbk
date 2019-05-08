<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'News']);
        Category::create(['name' => 'Activity']);
        Category::create(['name' => 'Promotion']);
        Category::create(['name' => 'Training']);
    }
}
