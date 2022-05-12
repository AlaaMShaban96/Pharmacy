<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutlaysTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlays', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id')->constrained()->nullable();
            $table->foreignId('financial_covenant_id')->constrained()->nullable();
            $table->foreignId('clause_id')->constrained()->nullable();
            $table->string('note')->nullable();
            $table->float('price')->nullable();
            $table->bigInteger('count')->nullable();
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
        Schema::drop('outlays');
    }
}
