<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('firstname');
          $table->string('lastname');
          $table->string('email')->unique();
          $table->string('location');
          $table->string('iso');
          $table->string('zip');
          $table->string('street');
          $table->text('hash');
          $table->string('password');
          $table->datetime('joined_at');
          $table->string('status');
          $table->longText('queries')->nullable();
          $table->rememberToken();
          $table->softDeletes();
          $table->timestamps();
        });

        //FK CONSTRAINTS
        Schema::table('query', function(Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('query', function($table) {
        $table->dropForeign('query_user_id_foreign');
      });
        Schema::drop('users');
    }
}
