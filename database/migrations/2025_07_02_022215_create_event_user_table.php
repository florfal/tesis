<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('event_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('event_id')
                  ->references('evento_id')
                  ->on('eventos')
                  ->onDelete('cascade');

            $table->primary(['user_id', 'event_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_user');
    }
};
