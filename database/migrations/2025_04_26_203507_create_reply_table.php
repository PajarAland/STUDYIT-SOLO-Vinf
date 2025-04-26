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
        Schema::create('reply', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CommentID');
            $table->unsignedBigInteger('UserID');
            $table->foreign('CommentID')->references('id')->on('modul_comments')->onDelete('cascade');
            $table->foreign('UserID')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('username');
            $table->text('replies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reply');
    }
};
