<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'name' => 'Zulhilmi',
            'address' => 'Puchong',
            'postcode' => '47120',
            'age' => 30
        ]);

        Profile::create([
            'name' => 'Zulhilmi 2',
            'address' => 'Puchong',
            'postcode' => '47120',
            'age' => 20
        ]);

        Profile::create([
            'name' => 'Zulhilmi 3',
            'address' => 'Puchong',
            'postcode' => '47120',
            'age' => 10
        ]);
    }
}
