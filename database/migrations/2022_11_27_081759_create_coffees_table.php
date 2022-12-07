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
        Schema::create('coffees', function (Blueprint $table) {
            $table->id();
            $table->char('code',8)->unique();
            $table->string('name');
            $table->string('tagline');
            $table->unsignedInteger('stock');
            $table->unsignedInteger('price');
            $table->unsignedInteger('weight');
            $table->string('taste');
            $table->text('description');
            $table->string('thumbnail');
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
        Schema::dropIfExists('coffees');
    }
};
