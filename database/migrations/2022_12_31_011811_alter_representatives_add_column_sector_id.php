<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRepresentativesAddColumnSectorId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('representatives', function (Blueprint $table) {
            $table->dropColumn('cpf');
            $table->unsignedBigInteger('sector_id')->nullable();

            $table->foreign('sector_id')
                    ->references('id')
                    ->on('sectors')
                    ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('representatives', function (Blueprint $table) {
            $table->dropForeign('representatives_sector_id_foreign');
            $table->dropColumn('sector_id');
        });
    }
}
