<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyForFilterCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filter_category', function (Blueprint $table) {
            $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filter_category', function (Blueprint $table) {
            $table->dropForeign('filter_category_filter_id_foreign');
            $table->dropForeign('filter_category_category_id_foreign');
        });
    }
}
