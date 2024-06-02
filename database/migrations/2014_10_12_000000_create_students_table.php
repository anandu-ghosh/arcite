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
            $table->string('middlename');
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('mobile');
            $table->string('telephone');
            $table->string('email')->unique();

            $table->string('qualification');
            $table->string('guardianname');
            $table->string('relationshiptoguardian');
            $table->string('guardiantelephone');
            $table->longText('address');
            $table->string('state');
            $table->string('city');
            $table->string('zipcode');
            $table->enum('status', ['visit', 'enquiry','allocated'])->default('visit');

            $table->longText('courses');
            $table->longText('departments');
            $table->longText('referenced_person');
            $table->longText('relationship');
            $table->longText('referencecontact');
            $table->longText('comments');
            
            $table->longText('aadhar_number')->nullable();
            $table->longText('aadhar_photo')->nullable();
            $table->longText('student_photo')->nullable();
            $table->longText('sslc_certificate')->nullable();
            $table->longText('plustwo_certificate')->nullable();
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
