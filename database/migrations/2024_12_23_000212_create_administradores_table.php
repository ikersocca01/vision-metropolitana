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
        Schema::create('administradores', function (Blueprint $table) {
            $table->id(); // Columna 'id' con auto_increment y llave primaria
            $table->string('username', 50)->unique(); // VARCHAR(50) con restricción UNIQUE
            $table->string('password_hash', 255); // VARCHAR(255)
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // TIMESTAMP con valor por defecto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
