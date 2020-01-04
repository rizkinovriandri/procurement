<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkkemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('skkems', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendor_id');
            $table->text('nomor_sk');
            $table->date('tgl_sk')->nullable($value = true);;
            $table->text('cur_modal_dasar')->nullable($value = true);;
            $table->decimal('modal_dasar',20,2)->nullable($value = true);;
            $table->text('cur_modal_disetor')->nullable($value = true);;
            $table->decimal('modal_disetor',20,2)->nullable($value = true);;
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
        Schema::dropIfExists('skkems');
    }
}
