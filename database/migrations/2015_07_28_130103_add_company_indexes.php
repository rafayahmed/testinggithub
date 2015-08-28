<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            //
            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('country_id')
                ->references('id')
                ->on('country')
                ->onDelete('cascade')
                ->onUpdate('cascade');           
            $table->foreign('city_id')
                ->references('id')
                ->on('city')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('state_id')
                ->references('id')
                ->on('state')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {

            $table->dropForeign('company_user_id_foreign');
            $table->dropForeign('company_country_id_foreign');
            $table->dropForeign('company_city_id_foreign');
            $table->dropForeign('company_state_id_foreign');
        });
    }
}
