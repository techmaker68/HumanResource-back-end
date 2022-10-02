<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function index(){
        $employees=Employee::all();
        return EmployeeResource::collection($employees);
    }
}
