<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeSizeInTableArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            $table->string('slug', 255)->nullable()->change();
            $table->string('meta_title', 255)->nullable()->change();
            $table->string('meta_description', 255)->nullable()->change();
            $table->string('meta_keyword', 255)->nullable()->change();
            $table->string('meta_page_topic', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
            $table->string('slug', 100)->nullable()->change();
            $table->string('meta_title', 100)->nullable()->change();
            $table->string('meta_description', 100)->nullable()->change();
            $table->string('meta_keyword', 100)->nullable()->change();
            $table->string('meta_page_topic', 100)->nullable()->change();
        });
    }
}
