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
            $table->string('emp_unique_id');
            $table->integer('cadre_id');
            $table->integer('designation_id');
            $table->string('name');
            $table->integer('department_id');
            $table->string('posting_place');
            $table->date('dateof_birth');
            $table->date('dateof_initial_appointment');
            $table->date('dateof_promotion');
            $table->date('dateof_retirement');
            $table->string('image_url');
            $table->string('status')->default('active');
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
