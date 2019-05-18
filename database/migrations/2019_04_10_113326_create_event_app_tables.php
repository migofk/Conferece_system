<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      /*
     To create events,event_photos, event_users tables.
      */
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event',255);
            $table->string('address',255);
            $table->string('photo',255)->nullable();
            $table->string('keywords',500)->nullable();
            $table->text('description',20000)->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();

            /*$table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');*/

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')
            ->onDelete('cascade');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')
            ->onDelete('cascade');

            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states')
            ->onDelete('cascade');

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')
            ->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade');

            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users');

            $table->timestamps();
        });
        ////////////////////
        Schema::create('event_photos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('photo',255);

          $table->unsignedBigInteger('event_id');
          $table->foreign('event_id')->references('id')->on('events')
          ->onDelete('cascade');

          $table->timestamps();
        });

        //////////////////
        Schema::create('event_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');

            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')
            ->onDelete('cascade');

            $table->integer('status')->unsigned()->nullable();

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
        Schema::dropIfExists('event_app_tables');
    }
}
