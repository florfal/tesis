<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('evento_id');

            $table->string('nombre');
            $table->string('email');
            $table->string('telefono')->nullable();

            $table->integer('cantidad');
            $table->integer('precio_unitario')->nullable();
            $table->integer('total')->nullable();

            $table->string('estado')->default('pendiente'); 
            // pendiente | pagado | cancelado

            $table->timestamps();

            // FK lógica (no obligatoria pero prolija)
            $table->foreign('evento_id')
                  ->references('evento_id')
                  ->on('eventos')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
