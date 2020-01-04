<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKualifikasiVendor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('kualifikasi')->after('type');

            // to change column datatype or change it to `nullable` 
            // or set default values , this is just example
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
        Schema::table('vendors', function (Blueprint $table) {
            //
        });
    }
}
