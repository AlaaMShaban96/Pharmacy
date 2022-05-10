<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('id');
            // $table->foreignId('drug_id')->constrained()->nullable()->default(null);
            // $table->foreignId('event_material_id')->constrained()->nullable();
            $table->bigInteger('event_material_id')->unsigned()->nullable();
            $table->foreign('event_material_id')->references('id')->on('event_materials');
            $table->bigInteger('drug_id')->unsigned()->nullable();
            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreignId('company_id')->constrained()->nullable();
            $table->foreignId('currency_id')->constrained()->nullable();
            $table->float('price')->nullable();
            $table->string('note')->nullable();
                        $table->string('count')->nullable();

            $table->enum('type', ['materials', 'drug'])->nullable();

            $table->foreignId('user_id')->constrained()->nullable();

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
        Schema::drop('invoices');
    }
}
