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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id(); // DNI como identificador único
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->date('fecha_vencimiento');
            $table->enum('estado', ['pendiente', 'en progreso', 'completada'])->default('pendiente');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
