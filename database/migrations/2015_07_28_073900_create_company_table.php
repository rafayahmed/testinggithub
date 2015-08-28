<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name',255);
            $table->string('group_of_company',255);
            $table->string('ceo_name',255)->default('');
            $table->string('hr_name',255)->default('');
            $table->integer('hr_nic');
            $table->string('hr_designation',255)->default('');
            $table->string('industry',255)->default('');
            $table->string('ownership_type',255)->default('');
            $table->text('company_description',500)->default('');
            $table->string('product_service',10)->default('');
            $table->string('country',255)->default('');            
            $table->string('city',255)->default('');            
            $table->string('origion_of_company',10)->default('');
            $table->string('website',255)->default('');            
            $table->integer('phone');
            $table->integer('fax');
            $table->integer('no_of_emp')->default(0);
            $table->integer('operating_since')->default(0);
            $table->string('logo',250);
            $table->string('stock_symbol',250);
            $table->integer('user_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->datetime('datetime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company');
    }
}
