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
        $table->string('email')->unique();
        $table->string('nombre_apellidos');
        $table->string('tinto')->nullable(); 
        $table->string('cerveza')->nullable();
        $table->string('copas');
        $table->string('mezcla');
        $table->string('refrescos');
        $table->string('observaciones');
        
        // ESTA ES LA LÍNEA CLAVE:
        $table->string('token')->unique()->nullable(); 
        
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
