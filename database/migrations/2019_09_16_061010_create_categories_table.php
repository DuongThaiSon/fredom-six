<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->string('avatar', 100)->nullable();
            $table->string('description', 100)->nullable();
            $table->text('detail')->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->boolean('is_new')->nullable()->default(true);
            $table->boolean('is_highlight')->nullable()->default(false);
            $table->string('slug', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->string('meta_title', 100)->nullable();
            $table->string('meta_discription', 100)->nullable();
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
        Schema::dropIfExists('categories');
    }
}
