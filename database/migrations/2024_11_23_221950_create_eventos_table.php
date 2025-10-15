<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
<<<<<<< HEAD
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
=======
    public function up(): void
>>>>>>> 2e75e41e676c4aa6cbe80752eb6570bac4b9d2b4
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('evento_id');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('ubicacion');
            $table->integer('dia');
            $table->string('mes');
            $table->string('dia_evento');
<<<<<<< HEAD
            $table->time('hora_inicio'); 
            $table->time('hora_fin'); 
=======
            $table->time('hora_inicio');
            $table->time('hora_fin');
>>>>>>> 2e75e41e676c4aa6cbe80752eb6570bac4b9d2b4
            $table->decimal('precio', 10, 2)->nullable();
            $table->string('imagen')->nullable();
            $table->text('extra')->nullable();
            $table->string('categoria');

<<<<<<< HEAD
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
=======
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
>>>>>>> 2e75e41e676c4aa6cbe80752eb6570bac4b9d2b4
    {
        Schema::dropIfExists('eventos');
    }
}
<<<<<<< HEAD

=======
>>>>>>> 2e75e41e676c4aa6cbe80752eb6570bac4b9d2b4
