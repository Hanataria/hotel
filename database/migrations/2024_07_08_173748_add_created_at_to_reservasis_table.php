<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedAtToReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate()->after('jumlah_orang');
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
            $table->dropColumn('created_at');
        });
    }
}
