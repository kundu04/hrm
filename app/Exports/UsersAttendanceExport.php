<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersAttendanceExport implements FromQuery
{
    protected $user_id;
    public function __construct($user_id)
    {
        $this->user_id= $user_id;
    }

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Attendance::query()->where('user_id',$this->user_id);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Attendance::all();
    // }
}
