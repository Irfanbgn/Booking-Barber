<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
    Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->foreignId('barber_id')->constrained('barbers')->onDelete('cascade');
    $table->string('style_name'); // Nama model rambut
    $table->string('image_result'); // Foto hasil potongan
    $table->text('description')->nullable();
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
