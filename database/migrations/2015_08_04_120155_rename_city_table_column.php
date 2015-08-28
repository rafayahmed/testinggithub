<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCityTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('city', function($table)
        {
            $table->renameColumn('city_name', 'name');
            $table->renameColumn('city_code', 'code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('city', function($table)
        {
            $table->renameColumn('name', 'city_name');
            $table->renameColumn('code', 'city_code');
        });
    }
}
