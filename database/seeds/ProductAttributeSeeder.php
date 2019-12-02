<?php

use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('product_attributes')->insert(
        //     array(
        //         'id' => '1',
        //         'name' => 'Phong cách',
        //         'type' => 'text',
        //         'allow_multiple' => '1',
        //         'can_select' => '1',
        //         'created_by' => '1',
        //         'created_at' => '2019-11-19 15:00:18',
        //     )
        // );
        DB::table('product_attributes')->insert(
            array(
                'id' => '1',
                'name' => 'Màu sắc',
                'type' => 'color',
                'allow_multiple' => '1',
                'can_select' => '1',
                'created_by' => '1',
                'created_at' => '2019-11-19 15:00:18',
            )
        );
        DB::table('product_attributes')->insert(
            array(
                'id' => '2',
                'name' => 'Kích cỡ',
                'type' => 'text',
                'allow_multiple' => '1',
                'can_select' => '1',
                'created_by' => '1',
                'created_at' => '2019-11-19 15:00:18',
            )
        );
        // DB::table('product_attributes')->insert(
        //     array(
        //         'id' => '4',
        //         'name' => 'Độ cao',
        //         'type' => 'text',
        //         'allow_multiple' => '1',
        //         'can_select' => '1',
        //         'created_by' => '1',
        //         'created_at' => '2019-11-19 15:00:18',
        //     )
        // );
        // DB::table('product_attributes')->insert(
        //     array(
        //         'id' => '5',
        //         'name' => 'Kiểu gót',
        //         'type' => 'text',
        //         'allow_multiple' => '1',
        //         'can_select' => '1',
        //         'created_by' => '1',
        //         'created_at' => '2019-11-19 15:00:18',
        //     )
        // );
        // DB::table('product_attributes')->insert(
        //     array(
        //         'id' => '6',
        //         'name' => 'Kiểu mũi',
        //         'type' => 'text',
        //         'allow_multiple' => '1',
        //         'can_select' => '1',
        //         'created_by' => '1',
        //         'created_at' => '2019-11-19 15:00:18',
        //     )
        // );
        
    }
}
