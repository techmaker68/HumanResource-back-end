<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Location;
use App\Models\Schedule;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

            Employee::create([
                'name'=>'john doe',
                'email' => 'abc@gmail.com',
                'address' => 'Testing Address',
                'designation' => 'ABC'
            ]);
              $shift=  Shift::create([
                    'title'=>'day',
                    'start' =>Carbon::now(),
                    'end' => Carbon::now()->addHour(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

              $location=  Location::create([
                    'title'=>'day',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $location=  Schedule::create([
                    'shift_id'=>$shift->id,
                    'location_id'=>$location->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    }
}
