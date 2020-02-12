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
        $user = factory(User::class,10)->create()
        	->each(function ($user) {
        		$user->lastTimeLogin()->save(factory(LastTimeLogin::class)->make());
        	});
    }
}
