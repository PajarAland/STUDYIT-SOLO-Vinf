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
        Schema::create('modul_comments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('ModulID');
        $table->unsignedBigInteger('UserID');
        $table->foreign('ModulID')->references('id')->on('moduls')->onDelete('cascade');
        $table->foreign('UserID')->references('id')->on('accounts')->onDelete('cascade');
        $table->string('username');
        $table->text('comment');
        $table->timestamps();

        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modul_comments');
    }
};
