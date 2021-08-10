<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
class sendpayslip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:payslip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send payslip for salary';

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
     * @return int
     */
    public function handle()
    {
        Mail::to('a@a.com')->send(new \App\Mail\SendPaySlip());
        echo 'mail sent!';
    }
}
