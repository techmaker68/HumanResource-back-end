<?php

namespace App\Imports;

use App\src\AppHumanResources\Attendance\Domain\Attendence;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
class AttendenceImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {        
        return new Attendence([
            //
            "employee_id" => $row['employee_id'],
            "schedule_id" => $row['schedule_id'],
            "check_in" => $row['check_in'],
            "check_out" => $row['check_out'],
            "status" => $row['status'],
            
        ]);
    }
}
