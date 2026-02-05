<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up()
{
    Schema::table('tabla_cumpleanos', function (Blueprint $table) {
        // Añadimos el token secreto
        $table->string('token')->nullable()->unique(); 
    });
}

public function down()
{
    Schema::table('tabla_cumpleanos', function (Blueprint $table) {
        $table->dropColumn('token');
    });
}
};