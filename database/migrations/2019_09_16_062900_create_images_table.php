<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();
            $table->string('url', 100)->nullable();
            $table->string('size', 100)->nullable();
            $table->string('mime', 100)->nullable();
            $table->string('caption', 100)->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->bigInteger('order')->nullable();
            $table->string('language', 3)->nullable();
            $table->bigInteger('imageable_id')->nullable();
            $table->string('imageable_type', 100)->nullable();
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
        Schema::dropIfExists('images');
    }
}
