<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddNewCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:company {name= new company}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Enter your company name: ') ?? 'new company';
        $this->info('your company: '.$name);
        if($this->confirm('Are you sure that is correct information: ')) {
            $company = Company::create([
                'name' => $name,
            ]);
            $this->info("a new company ".$company->name. " added");
        } else {
            $this->error('No company was added');
        }
        
    }
}
