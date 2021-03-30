<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;


class SettingController extends Controller
{
    public function ajaxDesignationByDepartmentId($id)
    {
        $data['designations'] = Designation::where(['status'=>'Active','department_id'=>$id])->pluck('name','id');
        return view('admin.setting.ajaxDesignationByDepartmentId',$data);
    }
}
