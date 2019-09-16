<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name', 100)->nullable();
            $table->string('company_address', 100)->nullable();
            $table->string('company_website_url', 100)->nullable();
            $table->string('company_tel', 100)->nullable();
            $table->string('company_hotline', 100)->nullable();
            $table->string('company_mobile', 100)->nullable();
            $table->string('company_email', 100)->nullable();
            $table->string('company_facebook_url', 100)->nullable();
            $table->string('email_smtp_server', 100)->nullable();
            $table->string('email_smtp_port', 100)->nullable();
            $table->string('email_smtp_user', 100)->nullable();
            $table->string('email_smtp_pass', 100)->nullable();
            $table->string('email_smtp_name', 100)->nullable();
            $table->string('email_smtp_email_address', 100)->nullable();
            $table->string('seo_page_title', 100)->nullable();
            $table->string('seo_meta_des', 100)->nullable();
            $table->string('seo_meta_keywords', 100)->nullable();
            $table->string('seo_meta_copyright', 100)->nullable();
            $table->string('seo_meta_author', 100)->nullable();
            $table->string('seo_meta_page_topic', 100)->nullable()->default('text');
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
        Schema::dropIfExists('settings');
    }
}
