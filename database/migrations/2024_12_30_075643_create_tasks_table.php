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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ModulID');
            $table->unsignedBigInteger('UserID');
            $table->foreign('ModulID')->references('id')->on('moduls')->onDelete('cascade');
            $table->foreign('UserID')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('FileTask');
            $table->enum('Status', ['Pending', 'Completed'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};