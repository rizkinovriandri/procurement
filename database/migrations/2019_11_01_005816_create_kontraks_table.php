<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontraksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        
        Schema::create('kontraks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po_no');
            $table->text('judul');
            $table->string('po_type');
            $table->string('metode');
            $table->unsignedInteger('count_of_item');
            $table->year('tahun');
            $table->date('po_date');
            $table->string('currency');
            $table->decimal('nilai_kontrak',20,2)->nullable($value = true);
            $table->string('vendor');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontraks');
    }
}
