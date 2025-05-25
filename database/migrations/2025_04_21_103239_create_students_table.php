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
            $table->string('student_id');
            $table->string('student_name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('phone');
            $table->date('dateofbirth');
            $table->string('class_numeric');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->string('mother_name');
            $table->string('mother_phone');
            $table->string('mother_address');
            $table->string('father_name');
            $table->string('father_phone');
            $table->string('father_address');
            $table->string('guardian_name');
            $table->string('guardian_phone');
            $table->string('guardian_address');
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
