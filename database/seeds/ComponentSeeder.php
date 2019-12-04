<?php

use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('components')->insert(
            [
                'id' => '1',
                'name' => 'Footer',
                'detail' => '<p>C&Ocirc;NG TY CP THỜI TRANG MOOLEZ VIỆT NAM</p>

                <p>Giấy ĐKDN: 017084424 - Ng&agrave;y cấp: 12/05/2017, được sửa đổi lần thứ nhất ng&agrave;y 24/07/2017</p>
                
                <p>Cơ quan cấp: Ph&ograve;ng Đăng k&yacute; Kinh doanh - Sở Kế hoạch v&agrave; Đầu tư TP.H&agrave; Nội</p>
                
                <p>Địa chỉ đăng k&yacute; kinh doanh: Số 18 Đo&agrave;n Trần Nghiệp, Phường B&ugrave;i Thị Xu&acirc;n, Quận Hai Ba Trưng, TP.H&agrave; Nội</p>
                
                <p>&nbsp;</p>
                
                <p>Bản quyển &copy; 2019 thuộc c&ocirc;ng ty Moolez VietNam jsc Design By Leotive</p>',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '1',
                'created_by' => '1'
            ]
        );
        DB::table('components')->insert(
            [
                'id' => '2',
                'name' => 'Showroom',
                'detail' => '<p>Hiện tại Moolez đ&atilde; c&oacute; 16 cửa h&agrave;ng tại Việt Nam được ph&acirc;n bố rộng r&atilde;i c&aacute;c v&ugrave;ng miền</p>',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '2',
                'created_by' => '1'
            ]
        );
        DB::table('components')->insert(
            [
                'id' => '3',
                'name' => 'customer',
                'detail' => 'DỊCH VỤ KHÁCH HÀNG: 0932 221 285',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '3',
                'created_by' => '1'
            ]
        );
        DB::table('components')->insert(
            [
                'id' => '4',
                'name' => 'Time',
                'detail' => 'GIỜ LÀM VIỆC: 8:00 ĐẾN 18:00 CÁC NGÀY TRONG TUẦN',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '4',
                'created_by' => '1'
            ]
        );
        DB::table('components')->insert(
            [
                'id' => '5',
                'name' => 'Bộ công thương',
                'detail' => '',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '5',
                'created_by' => '1'
            ]
        );       
        DB::table('components')->insert(
            [
                'id' => '6',
                'name' => 'Logo',
                'detail' => '',
                'is_public' => '1',
                'language' => 'vi',
                'order' => '6',
                'created_by' => '1'
            ]
        );
    }
}
