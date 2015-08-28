<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seeker', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nic');
            $table->string('nationality',255)->default('');
            $table->string('degree_level',250)->default('');
            $table->string('degree_title',255)->default('');
            $table->string('major_subject',255)->default('');            
            $table->string('institution',255)->default('');
            $table->datetime('first_job_start_date');
            $table->string('work_experience',255)->default('');
            $table->integer('functional_area');
            $table->string('career_level',250)->default('');
            $table->string('recent_job_title',255)->default('');            
            $table->string('company_name',255)->default('');            
            $table->string('job_country',255);
            $table->string('job_city',255);
            $table->string('upload_cv',250);
            $table->integer('completion_year');
            $table->integer('current_salary')->default(0);
            $table->integer('expected_salary')->default(0);
            $table->string('logo',250);
            $table->string('heard_from',250);
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
        Schema::drop('job_seeker');
    }
}
