<?php

use App\Company;
use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('contact:company-clean', function() {
	Company::whereDoesntHave('customers')
				->get()
				->each(function ($company) {
					$this->warn('Deleted :' .$company->name);
					$company->delete();
				});
	$this->info("all cleaned!");
})->describe('Clean all unuse company which has no customer');