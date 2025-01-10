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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('ubicacion');
            $table->decimal('dia', 10, 2); 
            $table->string('mes'); 
            $table->string('dia_evento'); 
            $table->time('horario');
            $table->decimal('precio', 10, 2)->nullable(); // Precio con dos decimales
            $table->string('imagen')->nullable(); // Ruta de la imagen
            $table->text('extra')->nullable(); // Información adicional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
