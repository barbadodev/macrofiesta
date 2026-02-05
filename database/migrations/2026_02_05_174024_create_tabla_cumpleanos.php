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
        Schema::create('tabla_cumpleanos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_apellidos');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('bebida_alcoholica');
            $table->string('mezcla');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabla_cumpleanos');
    }
};
