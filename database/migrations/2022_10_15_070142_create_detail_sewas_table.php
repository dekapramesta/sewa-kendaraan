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
        Schema::create('detail_sewa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idKendaraan')
                ->constrained('kendaraan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('idDriver')
                ->constrained('driver')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->dateTime('tanggalSewa')->nullable();
            $table->integer('bbm');
            $table->tinyInteger('status');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_sewas');
    }
};
