<?php

use Illuminate\Database\Seeder;

class seed_articles_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert(
            [
                'id' => '1',
                'name' => 'TÊN GIỚI THIỆU: MOOLEZ',
                'detail' => '<p>Đối với sản phẩm mang thương hiệu Moolez, kh&aacute;ch h&agrave;ng lu&ocirc;n được sở hữu những sản phẩm chất lượng đẳng c&acirc;́p nhất, từ nguy&ecirc;n li&ecirc;̣u da nh&acirc;̣p kh&acirc;̉u của các nước n&ocirc;̉i ti&ecirc;́ng như Italia đ&ecirc;́n linh ki&ecirc;̣n, phụ ki&ecirc;̣n đạt ti&ecirc;u chu&acirc;̉n ch&acirc;u &Acirc;u với kiểu d&aacute;ng thời thượng, dẫn đầu xu hướng.</p>

                <p>B&ecirc;n cạnh đ&oacute;, kh&aacute;ch h&agrave;ng c&ograve;n được hưởng nhiều gi&aacute; trị gia tăng,v&agrave; dịch vụ kh&aacute;c biệt m&agrave; c&aacute;c h&atilde;ng kh&aacute;c chưa hoặc kh&ocirc;ng c&oacute;.</p>',
                'is_public' => '1',
                'category_id' => '3',
                'order' => '7',
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '4',
                'name' => 'SỨ MỆNH',
                'detail' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'is_public' => '1',
                'category_id' => '3',
                'order' => '2'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '5',
                'name' => 'TẦM NHÌN',
                'detail' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'is_public' => '1',
                'category_id' => '3',
                'order' => '3'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '6',
                'name' => 'GIÁ TRỊ CỐT LÕI: VĂN HÓA DOANH NGHIỆP + NĂNG LỰC',
                'detail' => '<p>Đối với sản phẩm mang thương hiệu Moolez, kh&aacute;ch h&agrave;ng lu&ocirc;n được sở hữu những sản phẩm chất lượng đẳng c&acirc;́p nhất, từ nguy&ecirc;n li&ecirc;̣u da nh&acirc;̣p kh&acirc;̉u của các nước n&ocirc;̉i ti&ecirc;́ng như Italia đ&ecirc;́n linh ki&ecirc;̣n, phụ ki&ecirc;̣n đạt ti&ecirc;u chu&acirc;̉n ch&acirc;u &Acirc;u với kiểu d&aacute;ng thời thượng, dẫn đầu xu hướng.</p>

                <p>B&ecirc;n cạnh đ&oacute;, kh&aacute;ch h&agrave;ng c&ograve;n được hưởng nhiều gi&aacute; trị gia tăng,v&agrave; dịch vụ kh&aacute;c biệt m&agrave; c&aacute;c h&atilde;ng kh&aacute;c chưa hoặc kh&ocirc;ng c&oacute;.</p>',
                'is_public' => '1',
                'category_id' => '3',
                'order' => '4'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '7',
                'name' => 'THÔNG ĐIỆP TỪ NGƯỜI ĐỨNG ĐẦU',
                'detail' => '<p>Đối với sản phẩm mang thương hiệu Moolez, kh&aacute;ch h&agrave;ng lu&ocirc;n được sở hữu những sản phẩm chất lượng đẳng c&acirc;́p nhất, từ nguy&ecirc;n li&ecirc;̣u da nh&acirc;̣p kh&acirc;̉u của các nước n&ocirc;̉i ti&ecirc;́ng như Italia đ&ecirc;́n linh ki&ecirc;̣n, phụ ki&ecirc;̣n đạt ti&ecirc;u chu&acirc;̉n ch&acirc;u &Acirc;u với kiểu d&aacute;ng thời thượng, dẫn đầu xu hướng.</p>

                <p>B&ecirc;n cạnh đ&oacute;, kh&aacute;ch h&agrave;ng c&ograve;n được hưởng nhiều gi&aacute; trị gia tăng,v&agrave; dịch vụ kh&aacute;c biệt m&agrave; c&aacute;c h&atilde;ng kh&aacute;c chưa hoặc kh&ocirc;ng c&oacute;.</p>',
                'is_public' => '1',
                'category_id' => '3',
                'order' => '5'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '3',
                'name' => 'HyperX Cloud Silver',
                'detail' => '<p>asdasdadsa</p>',
                'description' => '<p>asdasasdasd</p>',
                'is_new' => '1',
                'is_public' => '1',
                'category_id' => '2',
                'updated_at' => '2019-10-23 00:54:54'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '2',
                'name' => 'ABOUT MOOLEZ',
                'detail' => '<p>Moolez l&agrave; thương hiệu thời trang nổi tiếng với c&aacute;c sản phẩm đồ da cao cấp, h&oacute;a mỹ phẩm v&agrave; phụ kiện đến từ Australia &ndash; đất nước c&oacute; gu thời trang rất khắt khe về chất lượng.</p>

                <p>Trụ sở của Moolez đặt tại Vịnh Port Phillip của th&agrave;nh phố Melbourne- Kinh đ&ocirc; thời trang &Uacute;c. Nền văn h&oacute;a đa sắc tộc c&ugrave;ng &aacute;nh nắng rực rỡ của xứ sở Kangaroo đ&atilde; v&agrave; đang l&agrave; nguồn cảm hứng bất tận của thương hiệu thời trang Moolez.</p>
                
                <p>Mỗi bộ sưu tập của Moolez đều tr&agrave;n đầy tinh thần thanh lịch v&agrave; tự do của v&ugrave;ng đất tươi đẹp Australia.</p>
                
                <p>Lu&ocirc;n nắm bắt v&agrave; dẫn đầu xu hướng, Moolez ti&ecirc;n phong tạo dựng phong c&aacute;ch, mang cả thế giới thời trang đến với người Việt.</p>',
                'is_public' => '1',
                'category_id' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '9',
                'name' => 'Càng đông càng rẻ, thổi bay nắng hè với con mưa sale Moolez',
                'description' => '<p>Đ&aacute;nh bay cơn n&oacute;ng m&ugrave;a h&egrave; với ƯU Đ&Atilde;I tới 50%++ từ MOOLEZ, &aacute;p dụng DUY NHẤT tại​Showroom Trần Duy Hưng v&agrave; Nha Trang.​&nbsp;</p>',
                'detail' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                <p style="text-align:center"><img alt="" src="https://nexus.leagueoflegends.com/wp-content/uploads/2017/07/LOL_CMS_107_Social_1200.jpg" style="height:630px; width:1200px" /></p>
                
                <p style="text-align:center">caption</p>
                
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                
                <p style="text-align:center"><img alt="" src="https://nexus.leagueoflegends.com/wp-content/uploads/2017/07/LOL_CMS_107_Social_1200.jpg" style="height:630px; width:1200px" /></p>
                
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',
                'is_new' => '1',
                'avatar' => '/media/article/leotive5db1036230cf9.png',
                'is_public' => '1',
                'is_highlight' => '1',
                'category_id' => '2',
                'updated_at' => '2019-10-23 00:54:54'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '10',
                'name' => 'Đẹp đa dụng đầy phong cách cùng bộ office bag từ Moolez',
                'avatar' => '/media/article/leotive5db103573663b.png',
                'description' => '<p>Lấy cảm hứng từ h&igrave;nh ảnh những phụ nữ văn ph&ograve;ng độc lập v&agrave; hiện đại, Th&aacute;ng 7 n&agrave;y Moolez đặc biệt gửi tặng đến c&aacute;c nữ kh&aacute;ch h&agrave;ng y&ecirc;u qu&yacute; của m&igrave;nh một chiếc Office bag v&ocirc; c&ugrave;ng thời trang v&agrave; đa dụng. Office bag tập trung v&agrave;o những đường n&eacute;t tối giản m&agrave; tinh tế, kh&ocirc;ng khoa trương, kh&ocirc;ng cầu k&igrave; m&agrave; vẫn khiến người mang n&oacute; nổi bật theo một c&aacute;ch rất ri&ecirc;ng.</p>',
            
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'category_id' => '2',
                'updated_at' => '2019-10-23 00:54:54'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '11',
                'name' => 'Biệt đãi ngọt ngào 699.000đ dành riêng cho quý ông',
                'avatar' => '/media/article/leotive5db10343e36dc.png',
                'description' => '<p>Với mong muốn ng&agrave;y c&agrave;ng nhiều qu&yacute; &ocirc;ng Việt được sở hữu những sản phẩm đồ da được l&agrave;m từ DA THẬT mang tinh thần Australia, MOOLEZ d&agrave;nh tặng ƯU Đ&Atilde;I NGỌT NG&Agrave;O duy nhất cho Ph&aacute;i Mạnh. Với mong muốn ng&agrave;y c&agrave;ng nhiều qu&yacute; &ocirc;ng Việt được sở hữu những sản phẩm đồ da được l&agrave;m từ DA THẬT mang tinh thần Australia, MOOLEZ d&agrave;nh tặng ƯU Đ&Atilde;I NGỌT NG&Agrave;O duy nhất cho Ph&aacute;i Mạnh. Với mong muốn ng&agrave;y c&agrave;ng nhiều qu&yacute; &ocirc;ng Việt được sở hữu những sản phẩm đồ da được l&agrave;m từ DA THẬT mang tinh thần Australia, MOOLEZ d&agrave;nh tặng ƯU Đ&Atilde;I NGỌT NG&Agrave;O duy nhất cho Ph&aacute;i Mạnh​</p>',
            
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'category_id' => '2',
                'updated_at' => '2019-10-23 00:54:54'
            ]
        );
    }
}
