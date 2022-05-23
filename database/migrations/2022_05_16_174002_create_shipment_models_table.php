<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentModelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_models', function (Blueprint $table) {
            $table->id('id');
            $table->string('code');
            $table->foreignId('drug_id');
            $table->foreignId('receive_id');
            $table->foreignId('user_id');
            $table->date('validity');
            $table->string('playback_number');
            $table->string('location')->nullable();
            $table->string('drug_size')->nullable();
            $table->bigInteger('count');
            $table->bigInteger('in_kind_inventory');
            $table->integer('samples')->nullable();
            $table->integer('damaged')->nullable();
            $table->integer('free')->nullable();
            $table->integer('another')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shipment_models');
    }
}
