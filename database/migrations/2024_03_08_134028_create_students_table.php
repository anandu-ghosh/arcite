<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->longText('address');
            $table->string('mobile');
            $table->string('email');
            $table->string('qualification');
            
            $table->enum('status', ['visit', 'enquiry','allocated'])->default('visit');

            $table->longText('aadhar_number')->nullable();
            $table->longText('aadhar_photo')->nullable();
            $table->longText('student_photo')->nullable();
            $table->longText('sslc_certificate')->nullable();
            $table->longText('plustwo_certificate')->nullable();
            $table->foreignId('course_id')->references('id')->on('courses')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
