<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert(
            [
                'id' => '1',
                'name' => 'New Arrival',
                'type' => '0',
                'parent_id' => '0',
                'category_id' => '11',
                'link' => '/new-arrival',
                'order' => '1',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '2',
                'name' => 'Tin tức',
                'type' => '0',
                'parent_id' => '0',
                'category_id' => '11',
                'link' => '/news',
                'order' => '2',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '3',
                'name' => 'Nữ',
                'type' => '0',
                'parent_id' => '0',
                'category_id' => '11',
                'link' => '/products/san-pham-nu.htm',
                'order' => '3',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '4',
                'name' => 'Nam',
                'type' => '0',
                'parent_id' => '0',
                'category_id' => '11',
                'link' => '/products/san-pham-nam.htm',
                'order' => '4',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '5',
                'name' => 'Gifts',
                'type' => '0',
                'parent_id' => '0',
                'category_id' => '11',
                'link' => '/products/gifts.htm',
                'order' => '5',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '6',
                'name' => 'Showrooms',
                'type' => '0',
                'parent_id' => '0',
                'category_id' => '11',
                'link' => '/showrooms',
                'order' => '6',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '7',
                'name' => 'Chính sách',
                'type' => '0',
                'parent_id' => '0',
                'category_id' => '12',
                'link' => '/chinh-sach',
                'order' => '7',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '8',
                'name' => 'Chính Sách Đổi Trả',
                'type' => '0',
                'parent_id' => '7',
                'category_id' => '12',
                'link' => '',
                'order' => '8',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '9',
                'name' => 'Chính Sách Bảo Hành',
                'type' => '0',
                'parent_id' => '7',
                'category_id' => '12',
                'link' => '',
                'order' => '9',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '10',
                'name' => 'Chính Sách Thẻ VIP',
                'type' => '0',
                'parent_id' => '7',
                'category_id' => '12',
                'link' => '',
                'order' => '10',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '11',
                'name' => 'Chính Sách Đại Lý',
                'type' => '0',
                'parent_id' => '7',
                'category_id' => '12',
                'link' => '',
                'order' => '11',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '12',
                'name' => 'Chính Sách Bảo Mật Thông Tin Khách Hàng',
                'type' => '0',
                'parent_id' => '7',
                'category_id' => '12',
                'link' => '',
                'order' => '12',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '13',
                'name' => 'Hướng Dẫn Chọn Size Giầy',
                'type' => '0',
                'parent_id' => '7',
                'category_id' => '12',
                'link' => '',
                'order' => '13',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '14',
                'name' => 'Chính Sách Bán Hàng Trên Website',
                'type' => '0',
                'parent_id' => '7',
                'category_id' => '12',
                'link' => '',
                'order' => '14',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '15',
                'name' => 'Liên hệ',
                'type' => '0',
                'parent_id' => '0',
                'category_id' => '12',
                'link' => '',
                'order' => '15',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '16',
                'name' => 'Trang chủ',
                'type' => '0',
                'parent_id' => '15',
                'category_id' => '12',
                'link' => '/home',
                'order' => '16',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '17',
                'name' => 'Giới thiệu',
                'type' => '0',
                'parent_id' => '15',
                'category_id' => '12',
                'link' => '/introduces',
                'order' => '17',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '18',
                'name' => 'Câu hỏi thường gặp',
                'type' => '0',
                'parent_id' => '15',
                'category_id' => '12',
                'link' => '',
                'order' => '18',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '19',
                'name' => 'Liên hệ với chúng tôi',
                'type' => '0',
                'parent_id' => '15',
                'category_id' => '12',
                'link' => '/showrooms',
                'order' => '19',
                'created_by' => '1',
            ]
        );
        DB::table('menus')->insert(
            [
                'id' => '20',
                'name' => 'Liên hệ với đại lý',
                'type' => '0',
                'parent_id' => '15',
                'category_id' => '12',
                'link' => '/showrooms',
                'order' => '20',
                'created_by' => '1',
            ]
        );
    }
}
