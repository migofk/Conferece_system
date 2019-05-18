<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*
     To create user, rest password, company, categories, countries, cities, states,company_photos, tables.
      */
      ///////////
      Schema::create('countries', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('country',255);

          $table->integer('status')->unsigned()->nullable();

          $table->timestamps();
      });
      ////////////////////////////
      Schema::create('states', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('state',255);

          $table->unsignedBigInteger('country_id');
          $table->foreign('country_id')->references('id')->on('countries')
          ->onDelete('cascade');

          $table->integer('status')->unsigned()->nullable();

          $table->timestamps();
      });
     ///////////////////////////
      Schema::create('cities', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('city',255);

          $table->unsignedBigInteger('state_id');
          $table->foreign('state_id')->references('id')->on('states')
          ->onDelete('cascade');

          $table->integer('status')->unsigned()->nullable();

          $table->timestamps();
      });
      ///////////////////
      Schema::create('users', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name',150);
          $table->string('email',150)->unique();
          $table->string('phone',255)->nullable();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->integer('role_id')->unsigned();
          $table->foreign('role_id')->references('id')->on('roles');
          $table->integer('status')->unsigned()->nullable();
          $table->integer('added_by')->unsigned()->nullable();
          $table->rememberToken();
          $table->timestamps();
      });

      ///////////////////

      Schema::create('password_resets', function (Blueprint $table) {
          $table->string('email')->index();
          $table->string('token');
          $table->timestamp('created_at')->nullable();
      });

     //////////////////
     Schema::create('categories', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->string('category',255);

         $table->unsignedBigInteger('parent_id')->nullable();
         $table->foreign('parent_id')->references('id')->on('categories')
         ->onDelete('cascade');

         $table->integer('status')->unsigned()->nullable();

         $table->timestamps();
     });
      //////////////////
      Schema::create('companies', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('comapny',255);
          $table->string('address',255);
          $table->string('phone',255)->nullable();
          $table->string('email',255)->nullable();
          $table->string('website',255)->nullable();
          $table->string('logo',255)->nullable();
          $table->string('keywords',500)->nullable();
          $table->string('video',500)->nullable();
          $table->string('postcode',255)->nullable();
          $table->string('contact_person',255)->nullable();
          $table->string('tax_number',500)->nullable();
          $table->string('commercial_registry',500)->nullable();
          $table->integer('status')->unsigned()->nullable();
          $table->text('description',20000)->nullable();
          $table->unsignedBigInteger('user_id');
          $table->foreign('user_id')->references('id')->on('users')
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


      //////////////////
      Schema::create('company_photos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('photo',255);

          $table->unsignedBigInteger('company_id');
          $table->foreign('company_id')->references('id')->on('companies')
          ->onDelete('cascade');

          $table->timestamps();
      });
    ///////////////////

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_app_tables');


    }
}
