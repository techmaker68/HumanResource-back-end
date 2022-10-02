<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class AttendenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        return [

            'id'=> $this->id,
            'employee_id'=> $this->employee_id,
            'schedule_id'=> $this->schedule_id,
            'status'=> $this->status,
            'check_in'=> $this->check_in,
            'check_out'=> $this->check_out,
            'total_hours'=>  DB::select('SELECT  TIME_FORMAT( SEC_TO_TIME( SUM( TIME_TO_SEC(check_out) - TIME_TO_SEC(check_in))), "%h:%i")
            AS `totalHours`
            FROM attendences WHERE `employee_id` = '.$this->employee_id),
            'relationships'=>[
                'employee'=>$this->employee,
                'schedule'=>$this->schedule
            ]
        ];
    }
}
