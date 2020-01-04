<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendor_id');
            $table->text('jenis_izin');
            $table->text('no_dokumen');
            $table->date('tgl_penerbitan')->nullable($value = true);
            $table->text('instansi_penerbit');
            $table->text('masa_berlaku_status');
            $table->date('berlaku_sampai')->nullable($value = true);
            $table->text('filename')->nullable($value = true);;
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
        Schema::dropIfExists('siups');
    }
}
