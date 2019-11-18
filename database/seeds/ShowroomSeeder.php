<?php

use Illuminate\Database\Seeder;

class ShowroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('showrooms')->insert(
            [
                'id' => '1',
                'name' => 'Trụ sở chính',
                'regions' => 'Miền Bắc',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '1',
                'email' => 'sales@moolez.com.vn',
                'phone' => '02432123075',
                'avatar' => 'mienbac-1.png',
                'address' => 'No 144 Tran Duy Hung, Cau Giay, Ha Noi',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5614211187303!2d105.79656991493229!3d21.01021068600846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca71e43e719%3A0x4731d2f66a059eb1!2zMTQ0IFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1573894514917!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'created_by' => '1'
            ]
        );
        DB::table('showrooms')->insert(
            [
                'id' => '2',
                'name' => 'Showroom 1',
                'regions' => 'Miền Bắc',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '2',
                'email' => 'sales@moolez.com.vn',
                'phone' => '0964567676',
                'avatar' => 'mienbac-2.png',
                'address' => ' Floor 7,HEC Building, No 2 Lane 95 Chua Boc, Truong Chinh Street, Dong Da, Ha Noi',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5614211187303!2d105.79656991493229!3d21.01021068600846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca71e43e719%3A0x4731d2f66a059eb1!2zMTQ0IFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1573894514917!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'created_by' => '1'
            ]
        );
        DB::table('showrooms')->insert(
            [
                'id' => '3',
                'name' => 'Showroom 2',
                'regions' => 'Miền Bắc',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '3',
                'email' => 'sales@moolez.com.vn',
                'phone' => '0964567676',
                'avatar' => 'mienbac-3.png',
                'address' => 'No 18 Doan Tran Nghiep Street, Hai Ba Trung, Ha noi',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5614211187303!2d105.79656991493229!3d21.01021068600846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca71e43e719%3A0x4731d2f66a059eb1!2zMTQ0IFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1573894514917!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'created_by' => '1'
            ]
        );
        DB::table('showrooms')->insert(
            [
                'id' => '4',
                'name' => 'Trụ sở chính',
                'regions' => 'Miền Trung',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '4',
                'email' => 'sales@moolez.com.vn',
                'phone' => ' 0905767254',
                'avatar' => 'mientrung-1.png',
                'address' => 'Lô L2-K1-2, Tầng L2 Vincom Plaza Đà Nẵng, Đà Nẵng',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5614211187303!2d105.79656991493229!3d21.01021068600846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca71e43e719%3A0x4731d2f66a059eb1!2zMTQ0IFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1573894514917!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'created_by' => '1'
            ]
        );
        DB::table('showrooms')->insert(
            [
                'id' => '5',
                'name' => 'Trụ sở chính',
                'regions' => 'Miền Trung',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '5',
                'email' => 'sales@moolez.com.vn',
                'phone' => '0974605144',
                'avatar' => 'mientrung-2.png',
                'address' => 'Lô 02 PG2 khu Vincom Phường Điện Biên, TP. Thanh Hoá',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5614211187303!2d105.79656991493229!3d21.01021068600846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca71e43e719%3A0x4731d2f66a059eb1!2zMTQ0IFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1573894514917!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'created_by' => '1'
            ]
        );
        DB::table('showrooms')->insert(
            [
                'id' => '6',
                'name' => 'Trụ sở chính',
                'regions' => 'Miền Trung',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '6',
                'email' => 'sales@moolez.com.vn',
                'phone' => '02432123076',
                'avatar' => 'mientrung-3.png',
                'address' => 'Vincom Nguyễn Trãi, TP. Huế',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5614211187303!2d105.79656991493229!3d21.01021068600846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca71e43e719%3A0x4731d2f66a059eb1!2zMTQ0IFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1573894514917!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'created_by' => '1'
            ]
        );
        DB::table('showrooms')->insert(
            [
                'id' => '7',
                'name' => 'Trụ sở chính',
                'regions' => 'Miền Nam',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '7',
                'email' => 'sales@moolez.com.vn',
                'phone' => '02432123075',
                'avatar' => 'miennam-1.png',
                'address' => 'Lô 09, Tầng L1 Vincom Plaza Gò Vấp, Phan Văn Trị, TP.HCM, TP.HCM',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5614211187303!2d105.79656991493229!3d21.01021068600846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca71e43e719%3A0x4731d2f66a059eb1!2zMTQ0IFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1573894514917!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'created_by' => '1'
            ]
        );
        DB::table('showrooms')->insert(
            [
                'id' => '8',
                'name' => 'Showroom 1',
                'regions' => 'Miền Nam',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '8',
                'email' => 'sales@moolez.com.vn',
                'phone' => '0936180892',
                'avatar' => 'miennam-2.png',
                'address' => 'Nha Trang Center, số 20 Trần Phú, Lộc Thọ, T.P Nha Trang',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5614211187303!2d105.79656991493229!3d21.01021068600846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca71e43e719%3A0x4731d2f66a059eb1!2zMTQ0IFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1573894514917!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'created_by' => '1'
            ]
        );
        DB::table('showrooms')->insert(
            [
                'id' => '9',
                'name' => 'Showroom 2',
                'regions' => 'Miền Nam',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '9',
                'email' => 'sales@moolez.com.vn',
                'phone' => '0939555801',
                'avatar' => 'miennam-3.png',
                'address' => 'L2 khu Uptown Vincom Plaza Xuân Khánh, Cần Thơ',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5614211187303!2d105.79656991493229!3d21.01021068600846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aca71e43e719%3A0x4731d2f66a059eb1!2zMTQ0IFRy4bqnbiBEdXkgSMawbmcsIFRydW5nIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1573894514917!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'created_by' => '1'
            ]
        );
    }
}
