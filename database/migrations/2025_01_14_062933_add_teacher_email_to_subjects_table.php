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
        Schema::table('subjects', function (Blueprint $table) {
            $table->string('teacher_email')->nullable();  // Add the teacher_email column
        });
    }
    
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('teacher_email');  // Remove the teacher_email column if the migration is rolled back
        });
    }
};
