<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArbolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arbols', function (Blueprint $table) {
            $table->id();

            $table->string('Calle');
            $table->string('Colonia');
            $table->integer('CodigoPostal');
            $table->string('Delegacion');
            $table->string('Foto');
            $table->string('Especie');
            $table->integer('Edad');
            $table->string('Status');
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
        Schema::dropIfExists('arbols');
    }
}
