<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTmppenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmppenjualans', function (Blueprint $table) {
            $table->id();
            $table->integer("id_barangs");
            $table->string("kode_tr_penjualan", 25);
            $table->integer("qty_jual");
            $table->integer("total_harga");
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
        Schema::dropIfExists('tmppenjualans');
    }
}
