<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusPinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus_pinjams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pinjams_id');
            $table->foreign('pinjams_id')->references('id')->on('pinjams')->onDelete('cascade');
            $table->unsignedBigInteger('bukus_id');
            $table->foreign('bukus_id')->references('id')->on('bukus')->onDelete('cascade');
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
        Schema::dropIfExists('bukus_pinjams');
    }
}
