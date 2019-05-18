<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('support_tickets', function (Blueprint $table) {
          $table->bigIncrements('id');

          $table->string('subject',255);
          $table->string('type',255);
          $table->text('description',20000)->nullable();
          $table->integer('status')->unsigned()->nullable();

          $table->unsignedBigInteger('user_id');
          $table->foreign('user_id')->references('id')->on('users')
          ->onDelete('cascade');

          $table->unsignedBigInteger('reported_id')->nullable();;
          $table->foreign('reported_id')->references('id')->on('companies')
          ->onDelete('cascade');



          $table->unsignedBigInteger('added_by')->nullable();
          $table->foreign('added_by')->references('id')->on('users');

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
        Schema::dropIfExists('request_app_tables');
    }
}
