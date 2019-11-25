<?php

use Illuminate\Database\Seeder;

class ProductAttributeValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_attribute_options')->insert([
            [
                'id' => '1',
                'product_attribute_id' => '1',
                'value' => 'Văn phòng',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '2',
                'product_attribute_id' => '1',
                'value' => 'Đường phố',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '3',
                'product_attribute_id' => '2',
                'value' => '#004080',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '4',
                'product_attribute_id' => '2',
                'value' => '#ff8040',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '5',
                'product_attribute_id' => '2',
                'value' => '#ffffff',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '6',
                'product_attribute_id' => '2',
                'value' => '#000000',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '7',
                'product_attribute_id' => '3',
                'value' => '38',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '8',
                'product_attribute_id' => '3',
                'value' => '39',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '9',
                'product_attribute_id' => '3',
                'value' => '40',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '10',
                'product_attribute_id' => '4',
                'value' => '3cm',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '11',
                'product_attribute_id' => '4',
                'value' => '5cm',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '12',
                'product_attribute_id' => '4',
                'value' => '7cm',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '13',
                'product_attribute_id' => '5',
                'value' => 'Gót nhọn',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '14',
                'product_attribute_id' => '5',
                'value' => 'Gót vuông',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '15',
                'product_attribute_id' => '5',
                'value' => 'Đế xuồng',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '16',
                'product_attribute_id' => '6',
                'value' => 'Mũi nhọn',
                'created_at' => '2019-11-20 14:26:22'
            ],
            [
                'id' => '17',
                'product_attribute_id' => '6',
                'value' => 'Mũi cong',
                'created_at' => '2019-11-20 14:26:22'
            ],
        ]);
    }
}
