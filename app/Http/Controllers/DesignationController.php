<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title']='Designation';
        $data['department']=Department::where('status','Active')->pluck('name','id');
        $designation=new Designation();
        $designation=$designation->with('relDepartment');
        $render=[];
        if(isset($request->name)){
            $designation=$designation->where('name','like','%'.$request->name.'%');
            $render['name']=$request->name;
        }
        if(isset($request->department_id)){
            $designation=$designation->where('department_id',$request->department_id);
            $render['department_id']=$request->department_id;
        }
        if(isset($request->status)){
            $designation=$designation->where('status',$request->status);
            $render['status']=$request->status;
        }
        $designation=$designation->paginate(10);
        $designation=$designation->appends($render);
        $data['designations']=$designation;
        return view('admin.designation.index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Create new Designation';
        $data['department']=Department::where('status','Active')->pluck('name','id');
        return view('admin.designation.create',$data);
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
            'department_id'=>'required',
            'name'=>'required',
            'status'=>'required',
        ]);
        $designation = new Designation();
        $designation->department_id = $request->department_id;
        $designation->name = $request->name;
        $designation->status = $request->status;
        $designation->save();
        session()->flash('success','Designation created successfully!');
        return redirect()->route('designation.index');

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
        $data['title']='Edit Designation';
        $data['designations']=Designation::findOrFail($id);
        $data['department']=Department::where('status','Active')->pluck('name','id');
        return view('admin.designation.edit',$data);
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
            'department_id'=>'required',
            'name'=>'required',
            'status'=>'required',
        ]);
        $designation = Designation::findOrFail($id);
        $designation->department_id = $request->department_id;
        $designation->name = $request->name;
        $designation->status = $request->status;
        $designation->save();
        session()->flash('success','Designation Updated successfully!');
        return redirect()->route('designation.index');
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
