<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPosterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_poster', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_position');
            $table->string('industry',255)->default('');
            $table->string('job_type',250);
            $table->string('department',255);
            $table->string('job_location',255);
            $table->string('gender',255);  
            $table->integer('age');          
            $table->string('min_edu',255)->default('');            
            $table->string('career_level',250)->default('');
            $table->string('degree_title',255)->default('');    
            $table->integer('salary')->default(0);
            $table->string('apply_by',250);
            $table->text('job_description',250);
            $table->datetime('job_posting_date');
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
        Schema::drop('job_poster');
    }
}
