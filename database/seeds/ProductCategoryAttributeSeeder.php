<?php

use Illuminate\Database\Seeder;

class ProductCategoryAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '9',
                'product_attribute_id' => '1',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '9',
                'product_attribute_id' => '2',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '9',
                'product_attribute_id' => '3',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '9',
                'product_attribute_id' => '4',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '9',
                'product_attribute_id' => '5',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '9',
                'product_attribute_id' => '6',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '10',
                'product_attribute_id' => '1',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '10',
                'product_attribute_id' => '2',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '10',
                'product_attribute_id' => '3',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '10',
                'product_attribute_id' => '4',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
        DB::table('product_category_attribute')->insert(
            array(
                'category_id' => '10',
                'product_attribute_id' => '6',
                'created_at' => '2019-11-20 14:26:22'
            )
        );
    }
}
