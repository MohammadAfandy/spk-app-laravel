<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('alternatif_id');
            $table->unsignedInteger('sub_kriteria_id');
            $table->unsignedInteger('nilai')->default(0);
            $table->text('ket')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('upated_by')->nullable();
            $table->timestamps();
            $table->foreign('alternatif_id')->references('id')->on('alternatif');
            $table->foreign('sub_kriteria_id')->references('id')->on('sub_kriteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}
