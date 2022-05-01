<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('supplier_name')->nullable();
            $table->bigInteger('event_type_id')->unsigned()->nullable();
            $table->bigInteger('event_specialty_id')->unsigned()->nullable();
            $table->bigInteger('event_location_id')->unsigned()->nullable();
            $table->bigInteger('event_number')->nullable();
            $table->date('event_date');
            $table->bigInteger('visitors_number')->nullable();
            $table->string('event_food_location')->nullable();
            $table->string('event_spicy_food_location')->nullable();
            $table->string('event_sweet_food_location')->nullable();
            $table->bigInteger('media_company_id')->unsigned()->nullable();
            $table->bigInteger('decoration_company_id')->unsigned()->nullable();
            $table->string('medical_representative')->nullable();
            $table->time('event_time')->nullable();
            $table->float('event_cost')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('event_type_id')->references('id')->on('event_types');
            $table->foreign('event_specialty_id')->references('id')->on('event_specialties');
            $table->foreign('event_location_id')->references('id')->on('event_locations');
            $table->foreign('decoration_company_id')->references('id')->on('companies');
            $table->foreign('media_company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
