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
            $table->string('emp_man_id');
            $table->integer('department_id');
            $table->integer('address_id')->nullable();
            $table->string('name');
            $table->string('designation');
            $table->date('dateof_birth');
            $table->string('current_post_held');
            $table->string('salary');
            $table->date('dateof_initial_appointment');
            $table->date('dateof_retirement');
            $table->string('status')->default('active');
            $table->string('image_url');
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
