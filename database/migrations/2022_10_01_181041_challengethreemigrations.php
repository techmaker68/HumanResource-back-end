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
        
        Schema::create('c2_company', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment = 'Name of company';
            $table->string('address')->comment = 'address';
            $table->timestamps();
        });

        Schema::create('c2_location', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment = 'Name of location';
            $table->string('coordinates')->comment = 'coordinates';
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('c2_company')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('c2_assets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment = 'Name of asset';
            $table->string('type')->comment = 'type of asset';
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('c2_company')->onDelete('cascade');

            $table->timestamps();
        });
        Schema::create('c2_managers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment = 'Name of manager';
            $table->string('designation')->comment = 'designation of asset';
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('c2_company')->onDelete('cascade');

            $table->timestamps();
        });
        Schema::create('c2_employee', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment = 'Name of person';
            $table->string('email')->comment = 'email of person';
            $table->string('address')->comment = 'address of person';
            $table->string('designation')->comment = 'designation of asset';
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('c2_managers')->onDelete('cascade');
            $table->unsignedBigInteger('company_group_id')->nullable();
            $table->timestamps();
        });
        Schema::create('c2_people', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment = 'title';
            $table->string('description')->comment = 'description of people';
            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('c2_managers')->onDelete('cascade');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('c2_employee')->onDelete('cascade');

            $table->timestamps();
        });

   

        Schema::create('c2_company_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment = 'Name of group';
            $table->string('type')->comment = 'type of person';
            $table->string('address')->comment = 'address';
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('c2_managers')->onDelete('cascade');
            $table->unsignedBigInteger('sub_group_id');
            $table->foreign('sub_group_id')->references('id')->on('c2_company_groups')->onDelete('cascade');
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
        //
        Schema::dropIfExists('c2_company_groups');
        Schema::dropIfExists('c2_employee');
        Schema::dropIfExists('c2_people');
        Schema::dropIfExists('c2_managers');
        Schema::dropIfExists('c2_assets');
        Schema::dropIfExists('c2_location');
        Schema::dropIfExists('c2_company');

    }
};
