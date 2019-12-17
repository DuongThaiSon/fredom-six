<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('title', 100)->nullable();
            $table->string('content', 100)->nullable();
            $table->string('note', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('payment_status', 100)->nullable()->default('Wait');
            $table->string('payment_choice', 100)->nullable();
            $table->string('ship', 100)->nullable();
            $table->string('delivery_status', 100)->nullable();
            $table->string('total', 100)->nullable();
            $table->dateTime('finished_date')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
