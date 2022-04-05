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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('empid');
            $table->string('emp_name');
            // $table->string('dept_id');
            $table->foreignId('dept_id')->constrained('departments');
            $table->string('emp_designation');
            $table->string('emp_current_post');
            $table->string('emp_cadre');
            $table->string('emp_salary');
            $table->string('emp_do_initial_appoinmnet');
            $table->string('emp_dob');
            $table->string('emp_dor');
            $table->string('emp_pic_url');
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
        Schema::dropIfExists('employees');
    }
};
