<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnVariantIdOnProductAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->dropForeign('product_attribute_values_variant_id_foreign');
        });
        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('variant_id');
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
        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('variant_id')->nullable()->unsigned()->after('id');
        });
        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->foreign('variant_id')
                ->references('id')->on('products')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }
}
