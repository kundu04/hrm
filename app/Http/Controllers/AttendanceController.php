<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Imports\UsersAttendanceImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    public function create()
    {
        $data['title']='Upload Attendance sheet';
        return view('admin.attendance.create',$data);
    }
    public function store(Request $request)
    {
        Excel::import(new UsersAttendanceImport, $request->file('attendance_file'));


        echo 'success';

    }
}
