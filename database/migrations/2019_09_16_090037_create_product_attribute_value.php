<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_value', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->integer('quantity')->unsigned()->nullable()->default(0);
            $table->bigInteger('product_attribute_value_id')->unsigned();
            $table->decimal('price_difference', 15, 2);
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
        Schema::dropIfExists('product_attribute_value');
    }
}
