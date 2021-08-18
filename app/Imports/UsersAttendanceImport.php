<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Shared\Date;
class UsersAttendanceImport extends DefaultValueBinder implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $user=User::where('employee_id',$row['user_id'])->get();
        
        if(count($user)==1)
        {
            $attendance=Attendance::where('user_id',$user[0]->id)->where('date',Date::excelToDateTimeObject($row['date']))->exists();
            if(!$attendance)
            {
                return new Attendance([
                    'user_id'=>$user[0]->id,
                    'date'=>Date::excelToDateTimeObject($row['date']),
                    'in_time'=>gmdate("g:i a",Date::excelToTimestamp($row['in_time'])),
                    'out_time'=>gmdate("g:i a", Date::excelToTimestamp($row['out_time'])),
                    'status'=>$row['status'],
                ]);
            }
        }
    }
}
