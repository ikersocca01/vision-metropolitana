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
        Schema::create('publicidad', function (Blueprint $table) {
            $table->id(); // Columna 'id' con auto_increment y llave primaria
            $table->string('nombre_corto', 100); // VARCHAR(100)
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo'); // ENUM('Activo', 'Inactivo') con valor por defecto
            $table->string('imagen', 255); // VARCHAR(255)
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // TIMESTAMP con valor por defecto
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // TIMESTAMP con actualización automática
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicidad');
    }
};
