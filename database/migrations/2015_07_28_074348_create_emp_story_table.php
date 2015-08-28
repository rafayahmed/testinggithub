<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_story', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255)->default('');
            $table->string('email',255);
            $table->string('designation',255)->default('');
            $table->string('company_name',255)->default('');
            $table->integer('phone');
            $table->string('address',50)->default('');
            $table->string('picture',255)->default('');
            $table->text('story',500)->default('');
            $table->integer('user_id')->unsigned();
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
        Schema::drop('emp_story');
    }
}
