<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLapkeusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('lapkeus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendor_id');
            
            $table->text('cur_nilai_asset')->nullable($value = true);
            $table->decimal('nilai_asset',20,2)->nullable($value = true);
            $table->text('cur_nilai_penjualan')->nullable($value = true);
            $table->decimal('nilai_penjualan',20,2)->nullable($value = true);
            $table->year('tahun');
            $table->text('filename')->nullable($value = true);
            
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
        Schema::dropIfExists('lapkeus');
    }
}
