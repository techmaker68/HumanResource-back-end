<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendence_faults', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment = 'Name of fault';
            $table->unsignedBigInteger('faultable_id')->comment = 'Foreign id of Emplyee/Attendance';
            $table->string('faultable_type')->comment = 'Reference of Model';
            $table->index(['faultable_id', 'faultable_type']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendence_faults');
    }
};
