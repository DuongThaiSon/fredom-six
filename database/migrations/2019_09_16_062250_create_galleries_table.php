<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();
            $table->string('avatar', 100)->nullable();
            $table->string('caption', 100)->nullable();
            $table->string('link_to', 100)->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->boolean('is_highlight')->nullable()->default(false);
            $table->boolean('is_new')->nullable()->default(true);
            $table->string('slug', 100)->nullable();
            $table->string('meta_title', 100)->nullable();
            $table->string('meta_description', 100)->nullable();
            $table->string('keyword', 100)->nullable();
            $table->string('meta_page_topic', 100)->nullable();
            $table->bigInteger('order')->nullable();
            $table->string('language', 3)->nullable();
            $table->bigInteger('category_id')->nullable();
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
        Schema::dropIfExists('galleries');
    }
}
