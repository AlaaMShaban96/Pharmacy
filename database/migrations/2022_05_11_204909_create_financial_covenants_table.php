<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialCovenantsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_covenants', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('department_id')->constrained()->nullable();
            $table->foreignId('financial_covenant_type_id')->constrained()->nullable();
            $table->foreignId('user_id')->constrained()->nullable();
            $table->string('number')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->date('date')->nullable();
            $table->string('note')->nullable();
            $table->float('total')->nullable();
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
        Schema::drop('financial_covenants');
    }
}
