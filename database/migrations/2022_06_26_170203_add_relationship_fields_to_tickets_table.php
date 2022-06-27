<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->unsignedBigInteger('priority_id');
            $table->foreign('priority_id')->references('id')->on('priorities');

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');

            $table->unsignedBigInteger('assigned_to_user_id')->nullable();
            $table->foreign('assigned_to_user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_assigned_to_user_id_foreign');
            $table->dropForeign('tickets_priority_id_foreign');
            $table->dropForeign('tickets_service_id_foreign');
            $table->dropForeign('tickets_status_id_foreign');
            $table->dropColumn('status_id');
            $table->dropColumn('priority_id');
            $table->dropColumn('assigned_to_user_id');
        });
    }
}
