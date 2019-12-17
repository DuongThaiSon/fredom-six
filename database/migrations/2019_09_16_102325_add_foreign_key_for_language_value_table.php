<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyForLanguageValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('language_value', function (Blueprint $table) {
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('language_keyword_id')->references('id')->on('language_keywords')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('language_value', function (Blueprint $table) {
            $table->dropForeign('language_value_language_id_foreign');
            $table->dropForeign('language_value_language_keyword_id_foreign');
        });
    }
}
