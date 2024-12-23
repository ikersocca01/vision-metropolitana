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
        Schema::create('notas', function (Blueprint $table) {
            $table->id(); // Columna 'id' con auto_increment y llave primaria
            $table->string('nombre_corto', 100); // VARCHAR(100)
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo'); // ENUM('Activo', 'Inactivo')
            $table->string('titulo', 255); // VARCHAR(255)
            $table->text('encabezado'); // TEXT
            $table->string('imagen', 255); // VARCHAR(255)
            $table->enum('categoria', ['Educación', 'Política', 'Deportes', 'Cultura', 'Tecnología', 'Otros']); // ENUM
            $table->text('contenido'); // TEXT
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // TIMESTAMP con valor por defecto
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // TIMESTAMP con actualización automática
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
