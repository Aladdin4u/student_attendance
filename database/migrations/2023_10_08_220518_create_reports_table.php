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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('semester');
            $table->string('session');
            $table->float('total');
            $table->unsignedBigInteger('attendanceId');
            $table->unsignedBigInteger('studentId');
            $table->unsignedBigInteger('courseId');
            $table->foreign('attendanceId')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('courseId')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('studentId')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
