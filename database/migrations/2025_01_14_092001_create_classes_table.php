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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->string('teacher');
            $table->string('grade_level');
            $table->integer('students');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('classes');
    }
    
};
