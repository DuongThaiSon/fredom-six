<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->insert(
            [
                'product_id' => '1',
                'category_id' => '15',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => '2',
                'category_id' => '15',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => '3',
                'category_id' => '15',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => '4',
                'category_id' => '15',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => '5',
                'category_id' => '15',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => '6',
                'category_id' => '15',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_category')->insert(
            [
                'product_id' => '7',
                'category_id' => '15',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
    }
}
