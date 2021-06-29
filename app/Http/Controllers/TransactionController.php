<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHead;
use App\Models\Transaction;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$transaction_type)
    {
        if($transaction_type=='Income' || $transaction_type=='Expense')
        {
        $data['title']=$transaction_type.' Details';
        $transaction=new Transaction();
        $data['transaction_heads']=TransactionHead::where('type',$transaction_type)->where('status','Active')
        ->pluck('name','id');
        $render=[];
        if(isset($request->transaction_id)){
            $transaction=Transaction::where('transaction_id','like','%'.$request->transaction_id.'%');
            $render['transaction_id']=$request->transaction_id;
        }
        if(isset($request->client_name)){
            $transaction=Transaction::where('client','like','%'.$request->client_name.'%');
            $render['client_name']=$request->client_name;
        }
        if(isset($request->transaction_head_id)){
            $transaction=Transaction::where('transaction_head_id',$request->transaction_head_id);
            $render['transaction_head_id']=$request->transaction_head_id;
        }
        $transaction=$transaction->with('relTransactionHead');
        $transaction=$transaction->where('type',$transaction_type);
        $transaction=$transaction->paginate(1);
        $transaction=$transaction->appends($render);
        $data['transactions']=$transaction;
        $data['transaction_type']=$transaction_type;
        $data['serial']=$this->managePaginationSerial($transaction);
        return view('admin.transaction.index',$data);
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($transaction_type)
    {
        if($transaction_type=='Income' || $transaction_type=='Expense')
        {
        $data['title']='Create new '.$transaction_type;
        $data['transaction_heads']=TransactionHead::where('type',$transaction_type)->where('status','Active')
        ->pluck('name','id');
        $data['transaction_type']=$transaction_type;
        return view('admin.transaction.create',$data);
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$transaction_type)
    {
        if($transaction_type=='Income' || $transaction_type=='Expense')
        {
        $request->validate([
            'transaction_head_id'=>'required',
            'client_name'=>'required',
            'description'=>'required',
            'date'=>'required',
            'amount'=>'required',
        ]);
        $transaction=new Transaction();
        if($transaction_type=='Income'){
            $transaction->transaction_id='In'.time();
        }elseif($transaction_type=='Expense'){
            $transaction->transaction_id='Ex'.time();
        }
        
        $transaction->client=$request->client_name;
        $transaction->transaction_head_id=$request->transaction_head_id;
        $transaction->type=$transaction_type;
        $transaction->description=$request->description;
        $transaction->date=$request->date;
        $transaction->amount=$request->amount;
        $transaction->save();
        
        session()->flash('success',$transaction_type.' added successfully');
        return redirect()->route('transaction.index',$transaction_type);
        }
        else{
            return redirect()->back();
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function managePaginationSerial($obj)
    {
        $serial=1;
        if($obj->currentPage()>1){
            $serial=(($obj->currentPage()-1)*$obj->perPage())+1;
        }
        return $serial;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
