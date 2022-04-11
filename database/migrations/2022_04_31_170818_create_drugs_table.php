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
            $table->string('atc')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('agent')->nullable();
            $table->float('pharmacist_margin')->nullable();
            $table->bigInteger('responsible_party')->constrained()->nullable();
            $table->string('code')->nullable();
            $table->string('package_id')->constrained();
            $table->string('name')->nullable();
            $table->string('b_g')->nullable();
            $table->string('ingredients')->nullable();
            $table->foreignId('currency_id')->constrained()->nullable();
            $table->foreignId('country_id')->constrained()->nullable();
            $table->foreignId('strata_id')->constrained()->nullable();
            $table->foreignId('route_id')->constrained()->nullable();
            $table->foreignId('drug_dosage_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('laboratory_id')->constrained()->nullable();
            $table->float('price')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::drop('drugs');
    }
}
