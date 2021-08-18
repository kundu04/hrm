<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Imports\UsersAttendanceImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{

    public function index()
    {
        $data['title']='List of Attendance';
        $attendance = new Attendance();
        $attendance= $attendance->with('relUser');
        $attendance= $attendance->orderBy('id','DESC');
        $attendance= $attendance->paginate(10);
        $data['attendances']=$attendance;
        return view('admin.attendance.index',$data);
    }
    public function create()
    {
        $data['title']='Upload Attendance sheet';
        return view('admin.attendance.create',$data);
    }
    public function store(Request $request)
    {
        Excel::import(new UsersAttendanceImport, $request->file('attendance_file'));

        session()->flash('success','Attendance uploaded successfully');
        return redirect()->route('attendance.index');

    }
}
