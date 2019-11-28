<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConfigProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('type', ['BASIC', 'VARIATION', 'DOWNLOADABLE', 'VARIABLE_PRODUCT'])->default('BASIC')->after('id');
            $table->string('barcode')->nullable()->default(null)->after('name');
            $table->tinyInteger('is_taxable')->nullable()->default(null)->after('is_new');
        });

        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->string('note', 100)->nullable()->after('value');
        });

        Schema::rename('product_attribute_values', 'product_attribute_options');

        Schema::table('product_attribute_value', function (Blueprint $table) {
            $table->renameColumn('product_attribute_value_id', 'product_attribute_id');
            $table->dropColumn('quantity');
            $table->dropColumn('price_difference');
        });

        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('variant_id')->nullable();
            $table->bigInteger('product_attribute_id')->nullable();
            $table->bigInteger('product_attribute_option_id')->nullable();
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
        Schema::dropIfExists('product_attribute_values');

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('barcode');
            $table->dropColumn('is_taxable');
        });

        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->dropColumn('note');
        });

        Schema::rename('product_attribute_options', 'product_attribute_values');

        Schema::table('product_attribute_value', function (Blueprint $table) {
            $table->renameColumn('product_attribute_id', 'product_attribute_value_id');
            $table->integer('quantity')->unsigned()->nullable()->default(0)->after('product_id');
            $table->decimal('price_difference', 15, 2)->after('quantity');
        });
    }
}
