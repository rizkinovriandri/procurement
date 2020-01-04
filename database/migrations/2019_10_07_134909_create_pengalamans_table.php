<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengalamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('pengalamans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendor_id');
            $table->text('nama_pelanggan');
            $table->text('nama_pekerjaan');
            $table->text('keterangan')->nullable($value = true);
            $table->text('cur_nilai_proyek')->nullable($value = true);
            $table->decimal('nilai_proyek',20,2)->nullable($value = true);
            $table->text('nomor_kontrak');
            $table->date('tgl_mulai_proyek')->nullable($value = true);
            $table->date('tgl_selesai_proyek')->nullable($value = true);
            $table->text('contact_person');
            $table->text('no_contact_person');
            
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
        Schema::dropIfExists('pengalamans');
    }
}
