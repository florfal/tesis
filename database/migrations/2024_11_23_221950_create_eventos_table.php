<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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

            // Campo creator_id (usuario que creó el evento)
            $table->unsignedBigInteger('creator_id')->nullable();

            // Clave foránea hacia la tabla users
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}

