<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'Announcement']);
        Tag::create(['name' => 'Religious']);
        Tag::create(['name' => 'Training']);
        Tag::create(['name' => 'Workshop']);
        Tag::create(['name' => 'Sales']);
        Tag::create(['name' => 'Sports']);
    }
}
