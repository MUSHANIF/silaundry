<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userid');            
            $table->integer('kode_invoce');   
            $table->string('tgl');   
            $table->string('batas_watu')->nullable();   
            $table->string('metode_pembayaran');  
            $table->string('status');  
            $table->integer('total');   
            $table->integer('biaya_tambahan');   
            $table->integer('kembalian');   
            $table->timestamps();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
          
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};

