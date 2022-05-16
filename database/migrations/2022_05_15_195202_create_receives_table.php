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
            $table->date('receive_date');
            $table->date('inventory_date');
            $table->foreignId('company_id');
            $table->foreignId('store_id');
            $table->foreignId('user_id');
            $table->string('company_code')->nullable();
            $table->string('shipment_number');
            $table->string('invoice_number');
            $table->string('packing_list_number');
            $table->bigInteger('containers_number');
            $table->bigInteger('pallet_number');
            $table->enum('shipment_type', ['air_freight', 'sea_freight']);
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
