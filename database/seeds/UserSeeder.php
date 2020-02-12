<?php

use App\LastTimeLogin;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class,10)->create()->each(function($user) {
        	$user->lastTimeLogin()->save(
        		factory(LastTimeLogin::class)->make([
        			'user_id' => $customer->id,
			      	'last_time' => now(),
			      	'ip' => 'N/A',
        		])
        	);
        });
    }
}
