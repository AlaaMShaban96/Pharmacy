<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->id('id');
            $table->string('ATC');
            $table->string('name');
            $table->string('B_G');
            $table->string('ingredients');
            $table->float('price')->nullable();
            $table->foreignId('drug_dosage_id')->constrained();
            $table->foreignId('company_id')->constrained();
            // $table->foreign('drug_dosage_id')->references('id')->on('drug_dosages');
            // $table->foreign('company_id')->references('id')->on('companies');


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
        Schema::drop('drugs');
    }
}
