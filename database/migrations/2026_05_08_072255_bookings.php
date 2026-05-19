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
    Schema::create('bookings', function (Blueprint $table) {
    $table->id();
    $table->string('customer_name'); // Jika tanpa login, catat manual
    $table->string('customer_phone');
    $table->foreignId('barber_id')->constrained('barbers');
    $table->date('booking_date');
    $table->time('booking_time'); // Jam mulai
    $table->string('status')->default('pending'); // pending, confirmed, done
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
