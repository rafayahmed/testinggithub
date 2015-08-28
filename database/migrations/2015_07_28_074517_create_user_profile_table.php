<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->text('summary',200);
            $table->string('education',255)->default('');
            $table->string('skills',255)->default('');
            $table->string('experience',255)->default('');           
            $table->string('language`',255)->default('');            
            $table->integer('saved_jobs');
            $table->string('cv',255)->default('');
            $table->string('picture',255)->default('');        
            $table->integer('user_id')->unsigned();           
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
        Schema::drop('user_profile');
    }
}
