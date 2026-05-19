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
        Schema::create('ADMINS', function (Blueprint $table) {
            $table->id('ID');
            $table->string('NAME', 255);
            $table->string('EMAIL', 255)->unique();
            $table->string('PASSWORD', 255);
            $table->string('ROLE', 50)->default('admin');
            $table->rememberToken('REMEMBER_TOKEN');
            $table->timestamps('CREATED_AT', 'UPDATED_AT');
            
            // Index untuk email agar cepat saat login
            $table->index('EMAIL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
