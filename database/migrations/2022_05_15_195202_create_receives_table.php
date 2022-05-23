<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receives', function (Blueprint $table) {
            $table->id('id');
            $table->date('receive_date')->nullable();;
            $table->date('inventory_date')->nullable();;
            $table->foreignId('company_id')->nullable();;
            $table->foreignId('store_id');
            $table->foreignId('user_id');
            $table->string('company_code')->nullable();
            $table->string('shipment_number');
            $table->string('invoice_number')->nullable();;
            $table->string('packing_list_number')->nullable();;
            $table->bigInteger('containers_number');
            $table->bigInteger('pallet_number');
            $table->enum('shipment_type', ['air_freight', 'sea_freight']);
            $table->enum('type', ['receive','inventory'])->default('receive');
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
        Schema::drop('receives');
    }
}
