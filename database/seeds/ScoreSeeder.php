<?php

use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $user = DB::table('users')->latest('id')->first();

        App\Score::create([
        	'user_id' => $user->id,
        	'level'	=> 'Easy',
        	'score'	=> rand(100,1000)
        ]);

        App\Score::create([
        	'user_id' => $user->id,
        	'level'	=> 'Medium',
        	'score'	=> rand(100,1000)
        ]);

        App\Score::create([
        	'user_id' => $user->id,
        	'level'	=> 'Hard',
        	'score'	=> rand(100,1000)
        ]);

        Eloquent::reguard();
    }
}
