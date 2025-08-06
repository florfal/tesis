<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('evento_id');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('ubicacion');
            $table->integer('dia');
            $table->string('mes');
            $table->string('dia_evento');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->decimal('precio', 10, 2)->nullable();
            $table->string('imagen')->nullable();
            $table->text('extra')->nullable();
            $table->string('categoria');

            // --------------  opcional --------------
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->foreign('creator_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
            // ----------------------------------------

            $table->timestamps();

            // AHORA PUEDEN SER NULL
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
}
