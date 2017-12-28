<?php

use Illuminate\Database\Seeder;

class ApplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Apply::class, 16)->create();
    }
}
