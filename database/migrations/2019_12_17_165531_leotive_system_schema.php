<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeotiveSystemSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('api_token')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('type')->nullable()->default('member');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable()->default('other');
            $table->text('note')->nullable();
            $table->ipAddress('last_login_ip')->nullable();
            $table->dateTime('last_login_time')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('description')->nullable();
            $table->text('detail')->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->boolean('is_highlight')->nullable()->default(false);
            $table->boolean('is_new')->nullable()->default(true);
            $table->string('slug')->unique()->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_page_topic')->nullable();
            $table->bigInteger('order')->unsigned()->nullable()->default(1);
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('language', 3)->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('note')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_status')->nullable()->default('Wait');
            $table->string('payment_choice')->nullable();
            $table->string('ship')->nullable();
            $table->boolean('is_free_ship')->default(false);
            $table->string('delivery_status')->nullable();
            $table->string('total')->nullable();
            $table->dateTime('finished_date')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->boolean('is_new')->nullable()->default(true);
            $table->boolean('is_highlight')->nullable()->default(false);
            $table->string('slug')->unique()->nullable();
            $table->string('type')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_page_topic')->nullable();
            $table->bigInteger('order')->unsigned()->nullable()->default(1);
            $table->string('language', 3)->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('type', 13)->nullable();
            $table->string('key')->nullable();
            $table->text('value')->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->string('language', 3)->nullable();
            $table->bigInteger('order')->unsigned()->nullable()->default(1);
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->text('note')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('description')->nullable();
            $table->string('link_to')->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->boolean('is_highlight')->nullable()->default(false);
            $table->boolean('is_new')->nullable()->default(true);
            $table->string('slug')->unique()->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_page_topic')->nullable();
            $table->bigInteger('order')->unsigned()->nullable()->default(1);
            $table->string('language', 3)->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content')->nullable();
            $table->smallInteger('rate')->nullable();
            $table->string('language', 3)->nullable();
            $table->bigInteger('reviewable_id')->unsigned()->nullable();
            $table->string('reviewable_type')->nullable();
            $table->bigInteger('reply_to')->unsigned()->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('size')->nullable();
            $table->string('mime')->nullable();
            $table->string('caption')->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->bigInteger('order')->unsigned()->nullable()->default(1);
            $table->string('language', 3)->nullable();
            $table->bigInteger('imageable_id')->unsigned()->nullable();
            $table->string('imageable_type')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });

        Schema::create('language_keywords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('keyword')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('language_value', function (Blueprint $table) {
            $table->bigInteger('language_id')->unsigned();
            $table->bigInteger('language_keyword_id')->unsigned();
            $table->string('value');
            $table->timestamps();
        });

        Schema::table('language_value', function (Blueprint $table) {
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('language_keyword_id')->references('id')->on('language_keywords')->onDelete('cascade');
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('type', 13)->nullable();
            $table->bigInteger('object_id')->unsigned()->nullable();
            $table->bigInteger('parent_id')->unsigned()->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('order')->unsigned()->nullable()->default(1);
            $table->string('language', 3)->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key')->unique();
            $table->string('display_name');
            $table->text('value');
            $table->text('details')->nullable()->default(null);
            $table->bigInteger('order')->unsigned()->nullable()->default(1);
            $table->timestamps();
        });

        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->boolean('is_new')->nullable()->default(true);
            $table->boolean('is_highlight')->nullable()->default(false);
            $table->string('slug')->unique()->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_page_topic')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('order')->unsigned()->nullable()->default(1);
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity')->unsigned()->nullable();
            $table->decimal('price', 15, 2);
            $table->bigInteger('cart_id')->unsigned()->nullable();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('email_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('send_when')->nullable();
            $table->string('need_value')->nullable();
            $table->text('detail')->nullable();
            $table->string('language')->nullable();
            $table->integer('update_by')->nullable();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content')->nullable();
            $table->string('rating')->nullable();
            $table->unsignedInteger('commentable_id')->unsigned()->nullable();
            $table->string('commentable_type')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->enum('type', ['BASIC', 'VARIATION', 'DOWNLOADABLE', 'VARIABLE_PRODUCT'])->default('BASIC');
            $table->string('barcode')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->dateTime('discount_start')->nullable();
            $table->dateTime('discount_end')->nullable();
            $table->string('avatar')->nullable();
            $table->string('unit')->nullable();
            $table->string('product_code')->nullable();
            $table->string('sku')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->boolean('is_public')->nullable()->default(true);
            $table->boolean('is_highlight')->nullable()->default(false);
            $table->boolean('is_new')->nullable()->default(true);
            $table->boolean('is_taxable')->nullable()->default(true);
            $table->string('slug')->unique()->nullable();
            $table->string('quantity')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_page_topic')->nullable();
            $table->bigInteger('order')->unsigned()->nullable()->default(1);
            $table->string('language', 3)->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('product_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('type')->nullable()->default('text');
            $table->boolean('allow_multiple')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('product_attribute_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_attribute_id')->nullable()->unsigned();
            $table->string('value')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });

        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->bigInteger('variant_id')->unsigned()->nullable();
            $table->bigInteger('product_attribute_id')->unsigned()->nullable();
            $table->bigInteger('product_attribute_option_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('product_attribute_value', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('product_attribute_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('product_category', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('product_attribute_options', function (Blueprint $table) {
            $table->foreign('product_attribute_id')
                ->references('id')->on('product_attributes')->onDelete('cascade');
        });

        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->foreign('variant_id')
                ->references('id')->on('products')->onDelete('cascade');
            $table->foreign('product_attribute_option_id')
                ->references('id')->on('product_attribute_options')->onDelete('cascade');
        });

        Schema::table('product_category', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::table('product_category', function (Blueprint $table) {
            $table->dropForeign('product_category_product_id_foreign');
            $table->dropForeign('product_category_category_id_foreign');
        });
        Schema::table('product_attribute_values', function (Blueprint $table) {
            $table->dropForeign('product_attribute_values_variant_id_foreign');
            $table->dropForeign('product_attribute_values_product_attribute_option_id_foreign');
        });
        Schema::table('product_attribute_options', function (Blueprint $table) {
            $table->dropForeign('product_attribute_options_product_attribute_id_foreign');
        });
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('product_attribute_value');
        Schema::dropIfExists('product_attribute_values');
        Schema::dropIfExists('product_attribute_options');
        Schema::dropIfExists('product_attributes');
        Schema::dropIfExists('products');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('email_contents');
        Schema::dropIfExists('cart_items');
        Schema::dropIfExists('videos');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('menus');
        Schema::table('language_value', function (Blueprint $table) {
            $table->dropForeign('language_value_language_id_foreign');
            $table->dropForeign('language_value_language_keyword_id_foreign');
        });
        Schema::dropIfExists('language_value');
        Schema::dropIfExists('language_keywords');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('images');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('components');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');
    }
}
