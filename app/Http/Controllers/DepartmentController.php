<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title']='Department';
        $department=new Department();
        $render=[];
        if(isset($request->name)){
            $department=$department->where('name','like','%'.$request->name.'%');
            $render['name']=$request->name;
        }
        if(isset($request->status)){
            $department=$department->where('status',$request->status);
            $render['status']=$request->status;
        }
        $department=$department->paginate(3);
        $department=$department->appends($render);
        $data['departments']=$department;
        return view('admin.department.index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Create new Department';
        return view('admin.department.create',$data);
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
            'status'=>'required',
        ]);
        $department = new Department();
        $department->name = $request->name;
        $department->status = $request->status;
        $department->save();
        session()->flash('success','Department created successfully!');
        return redirect()->route('department.index');

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
        $data['title']='Edit Department';
        $data['departments']=Department::findOrFail($id);
        return view('admin.department.edit',$data);
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
            'status'=>'required',
        ]);
        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->status = $request->status;
        $department->save();
        session()->flash('success','Department Updated successfully!');
        return redirect()->route('department.index');
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
