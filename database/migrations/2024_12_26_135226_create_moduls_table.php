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
        Schema::create('moduls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CourseID');
            $table->foreign('CourseID')->references('id')->on('courses')->onDelete('cascade');
            $table->string('Title');
            $table->string('Description');
            $table->string('Assetto');
            $table->string('YTEmbedLink');
            $table->string('Task');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moduls');
    }
};