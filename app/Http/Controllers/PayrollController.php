<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;

class PayrollController extends Controller
{
    public function manage($user_id)
    {
        $data['title']='Payroll';
        $data['user_id']=$user_id;
        $data['payroll']=Payroll::where('user_id',$user_id)->first();
        return view('admin.user.payroll.manage',$data);
    }
    public function update(Request $request,$user_id)
    {
        $request->validate([
        'gross_salary'=>'required',
        'basic_salary'=>'required',
        'house_rent'=>'required',
        'medical'=>'required',
        'travel_allowance'=>'required',
        'daily_allowance'=>'required',
        'provident_fund'=>'required',

        ]);
        $payroll=Payroll::where('user_id',$user_id)->first();
        if(empty($payroll)){
            $payroll= new Payroll();
        }
        $payroll->user_id=$user_id;
        $payroll->gross_salary=$request->gross_salary;
        $payroll->basic_salary=$request->basic_salary;
        $payroll->house_rent=$request->house_rent;
        $payroll->medical=$request->medical;
        $payroll->travel_allowance=$request->travel_allowance;
        $payroll->daily_allowance=$request->daily_allowance;
        $payroll->provident_fund=$request->provident_fund;
        $payroll->save();
        session()->flash('success','Payroll updated successfully');
        return redirect()->route('user.index');

    }
}
