<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableRfx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rfxs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rfx_no',10);
            $table->string('rfx_title',80);
            $table->string('transaction_type',50);
            $table->date('rfx_date');
            $table->date('sub_deadline');
            $table->date('tgl_opening');
            $table->string('sc_indicator',10)->nullable($value = true);
            $table->string('rfx_stat',10)->nullable($value = true);
            $table->date('te_start')->nullable($value = true);
            $table->date('te_to')->nullable($value = true);

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
        //
    }
}
