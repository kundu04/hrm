<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHead;
class TransactionHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title']='TransactionHead';
        $transactionHead=new TransactionHead();
        $render=[];
        if(isset($request->name)){
            $transactionHead=$transactionHead->where('name','like','%'.$request->name.'%');
            $render['name']=$request->name;
        }
        if(isset($request->type)){
            $transactionHead=$transactionHead->where('type',$request->type);
            $render['type']=$request->type;
        }
        if(isset($request->status)){
            $transactionHead=$transactionHead->where('status',$request->status);
            $render['status']=$request->status;
        }
        $transactionHead=$transactionHead->paginate(10);
        $transactionHead=$transactionHead->appends($render);
        $data['transactionHeads']=$transactionHead;
        return view('admin.transactionHead.index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Create new TransactionHead';
        return view('admin.transactionHead.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'status'=>'required',
        ]);
        $transactionHead = new TransactionHead();
        $transactionHead->name = $request->name;
        $transactionHead->type = $request->type;
        $transactionHead->status = $request->status;
        $transactionHead->save();
        session()->flash('success','TransactionHead created successfully!');
        return redirect()->route('transactionHead.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']='Edit TransactionHead';
        $data['transactionHeads']=TransactionHead::findOrFail($id);
        return view('admin.transactionHead.edit',$data);
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
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'status'=>'required',
        ]);
        $transactionHead = TransactionHead::findOrFail($id);
        $transactionHead->name = $request->name;
        $transactionHead->type = $request->type;
        $transactionHead->status = $request->status;
        $transactionHead->save();
        session()->flash('success','TransactionHead Updated successfully!');
        return redirect()->route('transactionHead.index');
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
