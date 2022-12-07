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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('ekspedisi');
            $table->unsignedInteger('weight');
            $table->unsignedInteger('total_harga');
            $table->unsignedInteger('ongkos_kirim');
            $table->unsignedInteger('biaya_layanan')->default(10000);
            $table->unsignedInteger('total_pembayaran');
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
        Schema::dropIfExists('order_details');
    }
};
