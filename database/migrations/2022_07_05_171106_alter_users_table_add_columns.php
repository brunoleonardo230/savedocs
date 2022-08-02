<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('cpf')->after('name')->unique()->nullable();
            $table->string('fantasy_name')->after('email')->nullable();
            $table->string('cnpj')->after('fantasy_name')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('access_token')->nullable();
            $table->dateTime('last_access')->nullable();
            $table->string('user_login')->nullable()->after('id');

            $table->unsignedBigInteger('type_user_id');
            $table->unsignedBigInteger('representative_id')->nullable();

            $table->foreign('type_user_id')
                    ->references('id')
                    ->on('type_users');
            
            $table->foreign('representative_id')
                    ->references('id')
                    ->on('representatives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign('users_type_user_id_foreign');
            $table->dropColumn('type_user_id');

            $table->dropForeign('users_representative_id_foreign');
            $table->dropColumn('representative_id');

            $table->dropColumn('cpf');
            $table->dropColumn('fantasy_name');
            $table->dropColumn('cnpj');
            $table->dropColumn('phone');
            $table->dropColumn('is_active');
            $table->dropColumn('access_token');
            $table->dropColumn('last_access');
            $table->dropColumn('user_login');
        });
    }
}
