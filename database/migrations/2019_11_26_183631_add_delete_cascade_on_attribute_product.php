<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteCascadeOnAttributeProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('product_attribute_options', function (Blueprint $table) {
            $table->bigInteger('product_attribute_id')->nullable()->unsigned()->change();
        });

        Schema::table('product_attribute_options', function (Blueprint $table) {
            $table->foreign('product_attribute_id')
                ->references('id')->on('product_attributes')->onDelete('cascade');
        });

        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->bigInteger('product_id')->nullable()->unsigned()->change();
            $table->bigInteger('variant_id')->nullable()->unsigned()->change();
            $table->bigInteger('product_attribute_id')->nullable()->unsigned()->change();
            $table->bigInteger('product_attribute_option_id')->nullable()->unsigned()->change();
        });

        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->foreign('variant_id')
                ->references('id')->on('products')->onDelete('cascade');
            $table->foreign('product_attribute_option_id')
                ->references('id')->on('product_attribute_options')->onDelete('cascade');
        }); 

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('product_attribute_options', function (Blueprint $table) {

            $table->dropForeign('product_attribute_options_product_attribute_id_foreign');
        });

        Schema::table('product_attribute_values', function (Blueprint $table) {

            $table->dropForeign('product_attribute_values_variant_id_foreign');
            $table->dropForeign('product_attribute_values_product_attribute_option_id_foreign');
        });

        Schema::enableForeignKeyConstraints();
    }
}
