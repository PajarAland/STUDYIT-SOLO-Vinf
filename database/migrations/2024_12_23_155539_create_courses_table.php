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
            $table->string('image');
            $table->unsignedBigInteger('instructor_id'); // Kolom foreign key
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
            $table->string('course_name');
            $table->text('description');
            $table->enum('level', ['beginner', 'intermediate', 'expert']);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'inactive']);
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
