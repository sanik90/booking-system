<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ResetBookingDev extends Command
{
    protected $signature = 'bookingdev:reset';

    protected $description = 'Hard reset migration';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->runCommands();
    }

    private function runCommands()
    {
        exec('mysqladmin -u '.env('DB_USERNAME').' -p'.env('DB_PASSWORD').' -f drop '.env('DB_DATABASE'));
        exec('mysqladmin -u '.env('DB_USERNAME').' -p'.env('DB_PASSWORD').' -f create '.env('DB_DATABASE'));
        $this->call('migrate:refresh');
        $this->call('db:seed');
    }
}
