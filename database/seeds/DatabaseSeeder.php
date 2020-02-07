<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	for($i=1; $i<6; $i++ ){
    		$this->call(UserSeeder::class);
    		$this->call(ScoreSeeder::class);
    	}
    }
}
