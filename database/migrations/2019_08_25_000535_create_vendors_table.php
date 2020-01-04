<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->unique();
            $table->string('badan_usaha');
            $table->text('alamat');
            $table->string('kota');
            $table->string('negara');
            $table->char('kode_pos', 6);
            $table->string('jenis_kantor');
            $table->string('telepon1');
            $table->string('telepon2')->nullable($value = true);
            $table->string('fax')->nullable($value = true);
            $table->string('email');
            $table->string('type');
            $table->string('website')->nullable($value = true);
            $table->boolean('k3l');
            $table->boolean('hubungan_keluarga');
            $table->string('nama_keluarga')->nullable($value = true);
            $table->string('created_by')->default("bunga");
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
        Schema::dropIfExists('vendors');
    }
}
