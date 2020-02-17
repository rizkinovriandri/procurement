<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengadaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pengadaans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pr_no',10);
            $table->integer('pr_line');
            $table->string('shopping_cart',10);
            $table->date('transfer_date');
            $table->string('pgr',5);
            $table->string('rfx',10);
            $table->string('no_material',15);
            $table->string('nama_material',100);
            $table->integer('quantity');
            $table->string('uom',5);
            $table->decimal('unit_price',20,2)->nullable($value = true);
            $table->decimal('total_budget',20,2)->nullable($value = true);
            $table->string('pr_cur',5);
            $table->string('po_no',10);
            $table->integer('po_line');
            $table->date('nego_start');
            $table->date('nego_to');
            $table->date('clarification_start');
            $table->date('clarification_to');

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
        Schema::dropIfExists('pengadaan');
    }
}
