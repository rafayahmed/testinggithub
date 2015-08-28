<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCountryTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('country', function($table)
        {
            $table->renameColumn('country_name', 'name');
            $table->renameColumn('country_code', 'code');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('country', function($table)
        {
            $table->renameColumn('name', 'country_name');
            $table->renameColumn('code', 'country_code');
        });
    }
}
