<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoxDataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('config', function(Blueprint $table) {
        $table->boolean('active');
        $table->boolean('debug');
        $table->boolean('cronjobs_active');
        $table->string('dev_ip');
        $table->string('baseurl');
        $table->string('api_key');
        $table->string('api_url');
        $table->nullableTimestamps();
      });

      Schema::create('backend_user', function(Blueprint $table) {
        $table->increments('backend_user_id');
        $table->string('role');
        $table->string('name');
        $table->string('password');
        $table->string('email');
        $table->nullableTimestamps();
        //increments() does this already
        //$table->primary('backend_user_id');
      });

      // Schema::create('users', function(Blueprint $table) {
      //   $table->increments('user_id');
      //   $table->string('firstname');
      //   $table->string('lastname');
      //   $table->string('email');
      //   $table->string('location');
      //   $table->string('iso');
      //   $table->string('zip');
      //   $table->string('street');
      //   $table->text('hash');
      //   $table->string('password');
      //   $table->datetime('joined_at');
      //   $table->string('status');
      //   $table->longText('queries')->nullable();
      //   $table->nullableTimestamps();
      //   //increments() does this already
      //   //$table->primary('users_id');
      // });

      Schema::create('query', function(Blueprint $table) {
        $table->increments('queries_id');
        $table->text('description');
        $table->text('request_uri');
        $table->longText('response_json')->nullable();
        $table->string('location')->unique()->default('');
        $table->integer('user_id')->unsigned();
        $table->datetime('date');
        $table->nullableTimestamps();
        //increments() does this already
        //$table->primary('queries_id');
      });

      Schema::create('cron_jobs', function(Blueprint $table) {
        $table->increments('cron_jobs_id');
        $table->string('jobname');
        $table->string('function');
        $table->string('runtime');
        $table->datetime('lastrun');
        $table->text('response');
        $table->boolean('locked');
        //increments() does this already
        //$table->primary('cron_jobs_id');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

      Schema::dropIfExists('config');
      Schema::dropIfExists('backend_user');
      Schema::dropIfExists('users');
      Schema::dropIfExists('queries');
      Schema::dropIfExists('cron_jobs');
    }
}
