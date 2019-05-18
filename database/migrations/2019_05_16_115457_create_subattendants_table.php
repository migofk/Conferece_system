<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubattendantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subattendants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('added_by')->unsigned()->nullable();
            $table->timestamp('arrival_date')->nullable();
            $table->timestamp('departure_date')->nullable();
            $table->integer('adult_number')->unsigned()->nullable();
            $table->integer('children_number')->unsigned()->nullable();
            $table->integer('children_age')->unsigned()->nullable();
            $table->string('package',150);
            $table->integer('room_single')->unsigned()->nullable();
            $table->integer('room_double')->unsigned()->nullable();
            $table->text('flight_details',1000);
            $table->text('comment',1000);
            $table->unsignedBigInteger('attendant_id');
            $table->foreign('attendant_id')->references('id')->on('attendants')
          ->onDelete('cascade');
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
        Schema::dropIfExists('subattendants');
    }
}
