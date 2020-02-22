<?php

use Illuminate\Database\Seeder;

class JenisBobotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(SpkApp\JenisBobot::class, 2)->create();
    }
}
