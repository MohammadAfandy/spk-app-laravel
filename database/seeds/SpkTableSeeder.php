<?php

use Illuminate\Database\Seeder;

class SpkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SpkApp\Spk::class, 50)->create();
    }
}
