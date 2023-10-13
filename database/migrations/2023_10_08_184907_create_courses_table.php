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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title')->unique();
            $table->string('semester');
            $table->string('session');
            $table->string('level');
            $table->foreignId('lecturerId')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('studentId');
            $table->foreign('studentId')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
