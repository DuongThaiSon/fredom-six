<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();
            $table->string('type', 13)->nullable();
            $table->bigInteger('object_id')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->string('link', 100)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
