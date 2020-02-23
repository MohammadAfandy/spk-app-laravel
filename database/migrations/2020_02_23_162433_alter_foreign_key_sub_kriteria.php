<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterForeignKeySubKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_kriteria', function (Blueprint $table) {
            $table->dropForeign('sub_kriteria_kriteria_id_foreign');
            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_kriteria', function (Blueprint $table) {
            $table->dropForeign('sub_kriteria_kriteria_id_foreign');
            $table->foreign('kriteria_id')->references('id')->on('kriteria');
        });
    }
}
