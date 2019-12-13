<?php

use Illuminate\Database\Seeder;

class ProductShowroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_showrooms')->insert(
            [
                'product_id' => '1',
                'showroom_id' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_showrooms')->insert(
            [
                'product_id' => '2',
                'showroom_id' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_showrooms')->insert(
            [
                'product_id' => '3',
                'showroom_id' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_showrooms')->insert(
            [
                'product_id' => '4',
                'showroom_id' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_showrooms')->insert(
            [
                'product_id' => '5',
                'showroom_id' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_showrooms')->insert(
            [
                'product_id' => '6',
                'showroom_id' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
        DB::table('product_showrooms')->insert(
            [
                'product_id' => '7',
                'showroom_id' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_at' => '2019-11-18 00:50:50'
            ]
        );
    }
}
