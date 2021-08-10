<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Models\User;
use App\Models\Transaction;

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
        $this->generatePaySlip();
        echo 'mail sent!';
    }
    public function generatePaySlip(){
        $employeeList=User::with('relPayroll')->where('status','active')->get();
        
        foreach($employeeList as $employee){
            $data['employee']=$employee;
            Mail::to( $data['employee']->email)->send(new \App\Mail\SendPaySlip($data));
            $this->transaction($employee);
        }
    }

    public function transaction($request){
        $transaction=new Transaction();
        $transaction->transaction_id='Ex'.time();
        $transaction->client=$request->id;
        $transaction->transaction_head_id=1;
        $transaction->type='Expense';
        $transaction->description='Salary for the month of '.date('M');
        $transaction->date=date('y-m-d');
        $transaction->amount=$request->relPayroll->gross_salary+$request->relPayroll->provident_fund;
        $transaction->save();
        
        $transaction=new Transaction();
        $transaction->transaction_id='In'.time();
        $transaction->client=$request->id;
        $transaction->transaction_head_id=2;
        $transaction->type='Income';
        $transaction->description='Salary for the month of '.date('M');
        $transaction->date=date('y-m-d');
        $transaction->amount=$request->relPayroll->provident_fund;
        $transaction->save();
    }
}
