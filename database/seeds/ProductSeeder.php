<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                'id' => '1',
                'name' => 'Áo Silica',
                'price' => '3000000',
                'discount' => '10',
                'avatar' => 'clothe.png',
                'unit' => 'cái',
                'product_code' => 'AS',
                'description' => '<p>Áo silica</p>',
                'detail' => '<figure class="table"><table><tbody><tr><td><p>Chất liệu:&nbsp;</p><p>Màu sắc: Đen</p></td><td><p>Xuất xứ: Việt Nam</p><p>Kích thước:&nbsp;</p></td></tr></tbody></table></figure><p>&nbsp; &nbsp;Mô tả:&nbsp;</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'ao-silica',
                'quantity' => '5',
                'order' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('products')->insert(
            [
                'id' => '2',
                'name' => 'Quần Short',
                'price' => '3000000',
                'discount' => '10',
                'avatar' => 'short.png',
                'unit' => 'cái',
                'product_code' => 'QS',
                'description' => '<p>Quần short</p>',
                'detail' => '<figure class="table"><table><tbody><tr><td><p>Chất liệu:&nbsp;</p><p>Màu sắc: Đen</p></td><td><p>Xuất xứ: Việt Nam</p><p>Kích thước:&nbsp;</p></td></tr></tbody></table></figure><p>&nbsp; &nbsp;Mô tả:&nbsp;</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'quan-short',
                'quantity' => '5',
                'order' => '2',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('products')->insert(
            [
                'id' => '3',
                'name' => 'Khuyên tai',
                'price' => '3000000',
                'discount' => '5',
                'avatar' => 'item.png',
                'unit' => 'đôi',
                'product_code' => 'KT',
                'description' => '<p>Khuyên tai</p>',
                'detail' => '<figure class="table"><table><tbody><tr><td><p>Chất liệu:&nbsp;</p><p>Màu sắc: Đen</p></td><td><p>Xuất xứ: Việt Nam</p><p>Kích thước:&nbsp;</p></td></tr></tbody></table></figure><p>&nbsp; &nbsp;Mô tả:&nbsp;</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'khuyen-tai',
                'quantity' => '5',
                'order' => '3',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('products')->insert(
            [
                'id' => '4',
                'name' => 'Đồng hồ',
                'price' => '1000000',
                'discount' => '10',
                'avatar' => 'watch.png',
                'unit' => 'cái',
                'product_code' => 'DH',
                'description' => '<p>Đồng hồ</p>',
                'detail' => '<figure class="table"><table><tbody><tr><td><p>Chất liệu:&nbsp;</p><p>Màu sắc: Đen</p></td><td><p>Xuất xứ: Việt Nam</p><p>Kích thước:&nbsp;</p></td></tr></tbody></table></figure><p>&nbsp; &nbsp;Mô tả:&nbsp;</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'dong-ho',
                'quantity' => '5',
                'order' => '4',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('products')->insert(
            [
                'id' => '5',
                'name' => 'Kính',
                'price' => '2000000',
                'discount' => '10',
                'avatar' => 'glasses.png',
                'unit' => 'cái',
                'product_code' => 'K',
                'description' => '<p>Kính</p>',
                'detail' => '<figure class="table"><table><tbody><tr><td><p>Chất liệu:&nbsp;</p><p>Màu sắc: Đen</p></td><td><p>Xuất xứ: Việt Nam</p><p>Kích thước:&nbsp;</p></td></tr></tbody></table></figure><p>&nbsp; &nbsp;Mô tả:&nbsp;</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'kinh',
                'quantity' => '5',
                'order' => '5',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('products')->insert(
            [
                'id' => '6',
                'name' => 'Mules',
                'price' => '3000000',
                'discount' => '10',
                'avatar' => 'shoes.png',
                'unit' => 'đôi',
                'product_code' => 'ML',
                'description' => '<p>Mules</p>',
                'detail' => '<figure class="table"><table><tbody><tr><td><p>Chất liệu:&nbsp;</p><p>Màu sắc: Đen</p></td><td><p>Xuất xứ: Việt Nam</p><p>Kích thước:&nbsp;</p></td></tr></tbody></table></figure><p>&nbsp; &nbsp;Mô tả:&nbsp;</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'mules',
                'quantity' => '5',
                'order' => '6',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('products')->insert(
            [
                'id' => '7',
                'name' => 'Túi Orico',
                'price' => '3000000',
                'discount' => '10',
                'avatar' => 'bag.png',
                'unit' => 'cái',
                'product_code' => 'TO',
                'description' => '<p>Túi Orio</p>',
                'detail' => '<figure class="table"><table><tbody><tr><td><p>Chất liệu:&nbsp;</p><p>Màu sắc: Đen</p></td><td><p>Xuất xứ: Việt Nam</p><p>Kích thước:&nbsp;</p></td></tr></tbody></table></figure><p>&nbsp; &nbsp;Mô tả:&nbsp;</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'tui-orico',
                'quantity' => '5',
                'order' => '7',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
    }
}
