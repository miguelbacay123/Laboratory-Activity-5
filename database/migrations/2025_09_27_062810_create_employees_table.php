<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id('employee_id');
        $table->string('first_name', 20)->nullable();
        $table->string('last_name', 25);
        $table->string('email', 25)->unique();
        $table->string('phone_number', 20)->nullable();
        $table->date('hire_date');
        $table->string('job_id', 10);
        $table->decimal('salary', 8, 2);
        $table->unsignedBigInteger('manager_id')->nullable();
        $table->unsignedBigInteger('department_id');

        $table->foreign('job_id')->references('job_id')->on('hr_jobs')->onDelete('cascade');
        $table->foreign('manager_id')->references('employee_id')->on('employees')->onDelete('set null');
        $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade');
        
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
