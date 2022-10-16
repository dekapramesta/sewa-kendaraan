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
        Schema::create('konsumsi_bbm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idKendaraan')
                ->constrained('kendaraan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('bbm');
            $table->dateTime('tanggalPengisian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsumsi_b_b_m_s');
    }
};
