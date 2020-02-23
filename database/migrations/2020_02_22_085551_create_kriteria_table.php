<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->enum('tipe', ['BENEFIT', 'COST']);	
            $table->decimal('bobot', 5, 2)->default(0);
            $table->unsignedInteger('spk_id');
            $table->text('ket')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('upated_by')->nullable();
            $table->timestamps();
            $table->foreign('spk_id')->references('id')->on('spk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
}
