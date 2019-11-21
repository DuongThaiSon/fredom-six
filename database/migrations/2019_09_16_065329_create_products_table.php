<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();
            $table->decimal('price', 15, 2);
            $table->decimal('discount', 15, 2);
            $table->dateTime('discount_start')->nullable();
            $table->dateTime('discount_end')->nullable();
            $table->string('avatar', 100)->nullable();
            $table->string('unit', 100)->nullable();
            $table->string('product_code', 100)->nullable();
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->boolean('is_highlight')->nullable()->default(false);
            $table->boolean('is_new')->nullable()->default(true);
            $table->string('slug', 100)->nullable();
            $table->string('quantity', 100)->nullable();
            $table->string('meta_title', 100)->nullable();
            $table->string('meta_description', 100)->nullable();
            $table->string('meta_keyword', 100)->nullable();
            $table->string('meta_page_topic', 100)->nullable();
            $table->bigInteger('order')->nullable();
            $table->string('language', 3)->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('products');
    }
}
