<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=['name','email','address','designation'];


    // public function schedule(): HasOne
    // {
    //     return $this->hasOne(Schedule::class);
    // }


      public function attendence(): HasMany
    {
        return $this->hasMany(Attendence::class);
    }

    public function fault()
    {
        return $this->morphOne(Employee::class, 'faultable');
    }
}
