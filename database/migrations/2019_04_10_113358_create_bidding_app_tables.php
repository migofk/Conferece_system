<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiddingAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*
     To create requests ,bidding tables.
      */
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('budget', 20, 2);
            $table->string('title',255);
            $table->string('duration',255)->nullable();
            $table->string('keywords',500)->nullable();
            $table->text('description',20000)->nullable();
            $table->integer('status')->unsigned()->nullable();

            /*$table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');*/

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')
            ->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade');

            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users');

            $table->timestamps();
        });

        //////////////////
        Schema::create('bids', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->decimal('bid', 20, 2);
            $table->text('description',20000)->nullable();
            $table->integer('status')->unsigned()->nullable();

            /*$table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');*/

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')
            ->onDelete('cascade');

            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests')
            ->onDelete('cascade');

            $table->timestamps();
        });

        ///////////////////////////
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidding_app_tables');
    }
}
