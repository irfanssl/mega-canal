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
        Schema::create('t_pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan', 20)->nullable();
            $table->timestamp('tanggal')->nullable();
            $table->string('nm_supplier', 50)->nullable();
            $table->string('nm_produk', 50)->nullable();
            $table->float('total')->nullable();
            $table->bigInteger('created_by');
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
        Schema::dropIfExists('t_pesanan');
    }
};
