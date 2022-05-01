<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventsMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_materials', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->bigInteger('event_material_id')->unsigned()->nullable();
            $table->bigInteger('count')->nullable();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('event_material_id')->references('id')->on('event_materials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
