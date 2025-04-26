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
    Schema::create('enrolls', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->unsignedBigInteger('user_id'); // Kolom user_id
        $table->foreign('user_id')->references('id')->on('accounts')->onDelete('cascade');
        $table->integer('amount'); // Kolom amount
        $table->timestamp('payment_date')->nullable(); // Kolom payment_date
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolls');
    }
};
