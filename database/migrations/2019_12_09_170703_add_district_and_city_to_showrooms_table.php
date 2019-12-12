<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDistrictAndCityToShowroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('showrooms', function (Blueprint $table) {
            $table->string('district')->nullable()->after('regions');
            $table->string('city')->nullable()->after('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('showrooms', function (Blueprint $table) {
            $table->dropColumn('district');
            $table->dropColumn('city');
        });
    }
}
