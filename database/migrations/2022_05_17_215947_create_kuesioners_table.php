<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuesionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuesioners', function (Blueprint $table) {
            $table->id('id_kuesioner');
            $table->string('pertanyaan');
            $table->integer('id_dimensi');
            $table->string('variabel');
            $table->string('pila');
            $table->string('pilb');
            $table->string('pilc');
            $table->string('pild');
            $table->string('pile');
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
        Schema::dropIfExists('kuesioners');
    }
}
