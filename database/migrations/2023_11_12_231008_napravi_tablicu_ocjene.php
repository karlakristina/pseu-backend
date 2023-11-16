<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('ocjene', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('korisnik_id');
            $table->unsignedBigInteger('skripta_id');
            $table->integer('ocjena');
            $table->text('komentar')->nullable();
            $table->timestamps();

            $table->foreign('korisnik_id')->references('id')->on('korisnici')->onDelete('cascade');
            $table->foreign('skripta_id')->references('id')->on('skripte')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ocjene');
    }
}
