<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id('id_reservasi'); // Primary key auto-increment
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_kamar');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('jumlah_orang');
            $table->decimal('jumlah_pembayaran', 10, 2);
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('cascade');
            $table->foreign('id_kamar')->references('id_kamar')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->dropForeign(['id_customer']);
            $table->dropForeign(['id_kamar']);
        });

        Schema::dropIfExists('reservasis');
    }
}
