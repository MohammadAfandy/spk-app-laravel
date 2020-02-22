<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->unsignedInteger('jenis_bobot_id');
            $table->text('ket')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('upated_by')->nullable();
            $table->timestamps();
            $table->foreign('jenis_bobot_id')->references('id')->on('m_jenis_bobot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spk');
    }
}
