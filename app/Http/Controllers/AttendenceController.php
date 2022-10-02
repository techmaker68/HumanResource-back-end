<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadAttendenceRequest;
use App\Http\Resources\AttendenceResource;
use App\Imports\AttendenceImport;
use App\src\AppHumanResources\Attendance\Domain\Attendence;
use App\src\AppHumanResources\Attendance\Application\AttendanceService;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    protected $attendenceService;
    public function __construct(AttendanceService $attendenceService)
    {
        $this->attendenceService = $attendenceService;
    }

    public function uploadAttendence(UploadAttendenceRequest $request)
    {
        $this->attendenceService->uploadAttendence($request);

    }

    public function getAttendence($id)
    {
       return $this->attendenceService->getAttendence($id);
    }

}
