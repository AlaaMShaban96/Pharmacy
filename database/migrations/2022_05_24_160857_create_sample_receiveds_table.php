<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampleReceivedsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample_receiveds', function (Blueprint $table) {
            $table->id('id');
            $table->string('code');
            $table->foreignId('company_id');
            $table->bigInteger('drug_id')->unsigned()->nullable();
            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->date('validity');
            $table->bigInteger('quantity');
            $table->bigInteger('store_id')->unsigned()->nullable();
            $table->foreign('store_id')->references('id')->on('stores');
            $table->float('price');
            $table->foreignId('user_id');
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
        Schema::drop('sample_receiveds');
    }
}
