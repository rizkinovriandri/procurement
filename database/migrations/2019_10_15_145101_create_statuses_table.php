<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
     
    public function up()
    {
        
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendor_id');
            $table->text('status');
            $table->date('tgl_mulai')->nullable($value = true);
            $table->date('tgl_berakhir')->nullable($value = true);
            $table->text('keterangan')->nullable($value = true);
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
        Schema::dropIfExists('statuses');
    }
}
