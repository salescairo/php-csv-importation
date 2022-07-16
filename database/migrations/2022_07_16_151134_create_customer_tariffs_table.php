<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_tariffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->string('from_postcode');
            $table->string('to_postcode');
            $table->double('from_weight',10,4);
            $table->double('to_weight',10,4);
            $table->double('cost',10,4);
            $table->boolean('valid')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_tariffs');
    }
}
