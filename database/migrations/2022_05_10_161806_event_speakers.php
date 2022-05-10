<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventSpeakers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_speakers', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('event_id')->constrained()->nullable();
            $table->foreignId('speaker_id')->constrained()->nullable();
            $table->string('count')->nullable();
            $table->string('note')->nullable();
            // $table->foreign('responsible_party')->references('id')->on('users');
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
