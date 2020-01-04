<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->increments('id');
            $table->year('tahun');
            $table->string('type');
            $table->string('vendor_no');
            $table->string('nama');
            $table->unsignedInteger('item_penawaran');
            $table->unsignedInteger('jlh_kontrak');
            $table->unsignedInteger('item_kontrak');
            $table->unsignedInteger('item_tepat_waktu');
            $table->unsignedInteger('item_terlambat');
            $table->unsignedInteger('item_misdelivery');
            $table->unsignedInteger('item_terlambat_100');
            $table->unsignedInteger('permintaan_penawaran');
            $table->unsignedInteger('penawaran_diterima');
            $table->unsignedInteger('jlh_hari_keterlambatan');
            $table->decimal('NP1',20,2)->nullable($value = true);
            $table->decimal('NP2',20,2)->nullable($value = true);
            $table->decimal('NP3',20,2)->nullable($value = true);
            $table->decimal('NP4',20,2)->nullable($value = true);
            $table->decimal('NP5',20,2)->nullable($value = true);
            $table->decimal('NP6',20,2)->nullable($value = true);
            $table->decimal('TNBTP',20,2)->nullable($value = true);
            $table->decimal('TNTTP',20,2)->nullable($value = true);
            $table->decimal('NTP',20,2)->nullable($value = true);
            $table->string('rating');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluasi');
    }
}
