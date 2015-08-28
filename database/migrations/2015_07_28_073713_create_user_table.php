<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('first_name',255)->default('');
            $table->string('last_name',255)->default('');
            $table->string('mid_name',255)->default('');
            $table->string('email',255)->default('');
            $table->string('password',255)->default('');
            $table->string('country',255)->default('');
            $table->string('city',255)->default('');
            $table->integer('office_no')->unsigned();
            $table->integer('mobile_no');
            $table->enum('gender',['male','female'])->default('male');
            $table->integer('dob');
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->timestamps();
            $table->datetime('datetime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
