<?php

namespace App\src\AppHumanResources\Attendance\Domain;

use App\Models\Employee;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendence extends Model
{
    use HasFactory;

    protected $fillable=['employee_id','schedule_id','status','check_in','check_out'];

    public function employee(): BelongsTo
    {

        return $this->belongsTo(Employee::class);
    }
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
    public function fault()
    {
        return $this->morphOne(Attendence::class, 'faultable');
    }
}

