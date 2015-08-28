<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_type',255);
            $table->string('first_name',255)->default('');
            $table->string('last_name',255)->default('');
            $table->string('job_title',255)->default('');
            $table->string('company_name',255);
            $table->string('company_address',255)->default('');
            $table->integer('phone_no');
            $table->integer('mobile_no');
            $table->string('product_of_interest',255)->default('');
            $table->string('method_og_contact',255)->default('');
            $table->integer('no_of_emp')->default(0);
            $table->integer('no_of_vacancies')->default(0);
            $table->text('message',255);
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
        Schema::drop('contact_sales');
    }
}
