<?php

namespace App\src\AppHumanResources\Attendance\Application;

use App\Http\Resources\AttendenceResource;
use App\Imports\AttendenceImport;
use App\src\AppHumanResources\Attendance\Domain\Attendence;
use GuzzleHttp\Psr7\Request;

class AttendanceService
{

    public function uploadAttendence($request)
    {

       $data= \Excel::import(new AttendenceImport, $request->file);
        return $data;

    }

    function getAttendence($id)
    {

        $attendence=Attendence::where('employee_id',$id)->get();
        if($attendence->isEmpty()){
            return response()->json(['error'=>'Employee with specified id does not have any record'],400);
        }
        return  AttendenceResource::collection($attendence);
    }
}
