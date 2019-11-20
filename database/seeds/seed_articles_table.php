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
                'slug' => 'ten-gioi-thieu-moolez',
                'category_id' => '3',
                'order' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
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
                'slug' => 'about-moolez',
                'category_id' => '4',
                'order' => '2',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '4',
                'name' => 'SỨ MỆNH',
                'detail' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'is_public' => '1',
                'slug' => 'su-menh',
                'category_id' => '3',
                'order' => '4',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '5',
                'name' => 'TẦM NHÌN',
                'detail' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
                'is_public' => '1',
                'slug' => 'tam-nhin',
                'category_id' => '3',
                'order' => '5',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '6',
                'name' => 'GIÁ TRỊ CỐT LÕI: VĂN HÓA DOANH NGHIỆP + NĂNG LỰC',
                'detail' => '<p>Đối với sản phẩm mang thương hiệu Moolez, kh&aacute;ch h&agrave;ng lu&ocirc;n được sở hữu những sản phẩm chất lượng đẳng c&acirc;́p nhất, từ nguy&ecirc;n li&ecirc;̣u da nh&acirc;̣p kh&acirc;̉u của các nước n&ocirc;̉i ti&ecirc;́ng như Italia đ&ecirc;́n linh ki&ecirc;̣n, phụ ki&ecirc;̣n đạt ti&ecirc;u chu&acirc;̉n ch&acirc;u &Acirc;u với kiểu d&aacute;ng thời thượng, dẫn đầu xu hướng.</p>

                <p>B&ecirc;n cạnh đ&oacute;, kh&aacute;ch h&agrave;ng c&ograve;n được hưởng nhiều gi&aacute; trị gia tăng,v&agrave; dịch vụ kh&aacute;c biệt m&agrave; c&aacute;c h&atilde;ng kh&aacute;c chưa hoặc kh&ocirc;ng c&oacute;.</p>',
                'is_public' => '1',
                'slug' => 'gia-tri-cot-loi-van-hoa-doanh-nghiep-nang-luc',
                'category_id' => '3',
                'order' => '6',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '7',
                'name' => 'THÔNG ĐIỆP TỪ NGƯỜI ĐỨNG ĐẦU',
                'detail' => '<p>Đối với sản phẩm mang thương hiệu Moolez, kh&aacute;ch h&agrave;ng lu&ocirc;n được sở hữu những sản phẩm chất lượng đẳng c&acirc;́p nhất, từ nguy&ecirc;n li&ecirc;̣u da nh&acirc;̣p kh&acirc;̉u của các nước n&ocirc;̉i ti&ecirc;́ng như Italia đ&ecirc;́n linh ki&ecirc;̣n, phụ ki&ecirc;̣n đạt ti&ecirc;u chu&acirc;̉n ch&acirc;u &Acirc;u với kiểu d&aacute;ng thời thượng, dẫn đầu xu hướng.</p>

                <p>B&ecirc;n cạnh đ&oacute;, kh&aacute;ch h&agrave;ng c&ograve;n được hưởng nhiều gi&aacute; trị gia tăng,v&agrave; dịch vụ kh&aacute;c biệt m&agrave; c&aacute;c h&atilde;ng kh&aacute;c chưa hoặc kh&ocirc;ng c&oacute;.</p>',
                'is_public' => '1',
                'slug' => 'thong-diep-tu-nguoi-dung-dau',
                'category_id' => '3',
                'order' => '7',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        
        DB::table('articles')->insert(
            [
                'id' => '9',
                'name' => 'Càng đông càng rẻ, thổi bay nắng hè với con mưa sale Moolez',
                'description' => '<p>Đ&aacute;nh bay cơn n&oacute;ng m&ugrave;a h&egrave; với ƯU Đ&Atilde;I tới 50%++ từ MOOLEZ, &aacute;p dụng DUY NHẤT tại​Showroom Trần Duy Hưng v&agrave; Nha Trang.​&nbsp;</p>',
                'detail' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                <p style="text-align:center"><img alt="" src="https://moolez.vn/uploads/news/_large/Untitled0638-compressed.jpg" /></p>
                
                <p style="text-align:center">caption</p>
                
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                
                <p style="text-align:center"><img alt="" src="https://moolez.vn/uploads/news/_large/Untitled0638-compressed.jpg" /></p>
                
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',
                'is_new' => '1',
                'avatar' => 'leotive5db1036230cf9.png',
                'is_public' => '1',
                'slug' => 'cang-dong-cang-re-thoi-bay-nang-he-voi-con-mua-sale-moolez',
                'is_highlight' => '1',
                'order' => '9',
                'category_id' => '2',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '10',
                'name' => 'Đẹp đa dụng đầy phong cách cùng bộ office bag từ Moolez',
                'avatar' => 'leotive5db103573663b.png',
                'description' => '<p>Lấy cảm hứng từ h&igrave;nh ảnh những phụ nữ văn ph&ograve;ng độc lập v&agrave; hiện đại, Th&aacute;ng 7 n&agrave;y Moolez đặc biệt gửi tặng đến c&aacute;c nữ kh&aacute;ch h&agrave;ng y&ecirc;u qu&yacute; của m&igrave;nh một chiếc Office bag v&ocirc; c&ugrave;ng thời trang v&agrave; đa dụng. Office bag tập trung v&agrave;o những đường n&eacute;t tối giản m&agrave; tinh tế, kh&ocirc;ng khoa trương, kh&ocirc;ng cầu k&igrave; m&agrave; vẫn khiến người mang n&oacute; nổi bật theo một c&aacute;ch rất ri&ecirc;ng.</p>',
            
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'dep-da-dung-day-phong-cach-cung-bo-office-bag-tu-moolez',
                'order' => '10',
                'category_id' => '2',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '11',
                'name' => 'Biệt đãi ngọt ngào 699.000đ dành riêng cho quý ông',
                'avatar' => 'leotive5db10343e36dc.png',
                'description' => '<p>Với mong muốn ng&agrave;y c&agrave;ng nhiều qu&yacute; &ocirc;ng Việt được sở hữu những sản phẩm đồ da được l&agrave;m từ DA THẬT mang tinh thần Australia, MOOLEZ d&agrave;nh tặng ƯU Đ&Atilde;I NGỌT NG&Agrave;O duy nhất cho Ph&aacute;i Mạnh. Với mong muốn ng&agrave;y c&agrave;ng nhiều qu&yacute; &ocirc;ng Việt được sở hữu những sản phẩm đồ da được l&agrave;m từ DA THẬT mang tinh thần Australia, MOOLEZ d&agrave;nh tặng ƯU Đ&Atilde;I NGỌT NG&Agrave;O duy nhất cho Ph&aacute;i Mạnh. Với mong muốn ng&agrave;y c&agrave;ng nhiều qu&yacute; &ocirc;ng Việt được sở hữu những sản phẩm đồ da được l&agrave;m từ DA THẬT mang tinh thần Australia, MOOLEZ d&agrave;nh tặng ƯU Đ&Atilde;I NGỌT NG&Agrave;O duy nhất cho Ph&aacute;i Mạnh​</p>',
            
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'biet-dai-ngot-ngao-699000d-danh-rieng-cho-quy-ong',
                'order' => '11',
                'category_id' => '2',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '12',
                'name' => 'Adam Smith',
                'avatar' => 'business.png',
                'description' => '<p>english&nbsp;teacher</p>',
                'detail' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora nostrum ad animi ipsam beatae ea voluptatum distinctio, ut suscipit quos.</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'adam-smith',
                'order' => '12',
                'category_id' => '13',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '13',
                'name' => 'jennifer lopez',
                'avatar' => 'customer2.png',
                'description' => '<p>official</p>',
                'detail' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora nostrum ad animi ipsam beatae ea voluptatum distinctio, ut suscipit quos.</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'jennifer-lopez',
                'order' => '13',
                'category_id' => '13',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '14',
                'name' => 'Quỳnh nguyễn',
                'avatar' => 'customer5.png',
                'description' => '<p>blogger</p>',
                'detail' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora nostrum ad animi ipsam beatae ea voluptatum distinctio, ut suscipit quos.</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'adam-smith',
                'order' => '14',
                'category_id' => '13',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '15',
                'name' => 'John smith',
                'avatar' => 'customer4.png',
                'description' => '<p>ceo</p>',
                'detail' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora nostrum ad animi ipsam beatae ea voluptatum distinctio, ut suscipit quos.</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'adam-smith',
                'order' => '15',
                'category_id' => '13',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '16',
                'name' => 'Huyền Anh',
                'avatar' => 'customer3.png',
                'description' => '<p>BTN&nbsp;b&aacute;o&nbsp;Đẹp</p>',
                'detail' => '<p>This&nbsp;collection&nbsp;is&nbsp;so&nbsp;well&nbsp;organised&nbsp;&ndash;&nbsp;the&nbsp;best&nbsp;I&rsquo;ve&nbsp;ever&nbsp;seen&nbsp;from&nbsp;here.&nbsp;The&nbsp;ideas&nbsp;are&nbsp;also&nbsp;really&nbsp;fresh&nbsp;and&nbsp;new&nbsp;&ndash; great&nbsp;work.&nbsp;I&nbsp;cant&nbsp;wait&nbsp;to&nbsp;start&nbsp;work&nbsp;with&nbsp;it!</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'huyen-anh',
                'order' => '16',
                'category_id' => '14',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '17',
                'name' => 'Giới thiệu',
                'avatar' => 'bags.png',
                'description' => '<p>sản phẩm da trăn moolez</p>',
                'detail' => '<p>Lu&ocirc;n l&agrave; t&acirc;m điểm mỗi lần ra mắt, vẻ đẹp lộng lẫy, quyền lực v&agrave; ma mị của những chiếc t&uacute;i x&aacute;ch da trăn thuộc d&ograve;ng Luxury Limited tiếp tục khiến giới mộ điệu cho&aacute;ng ngợp, t&ocirc;n thờ. Từ lớp da trăn gấm nu&ocirc;i qu&yacute; hiếm c&oacute; hoa văn độc nhất v&ocirc; nhị, những nghệ nh&acirc;n bậc thầy đ&atilde; kh&eacute;o l&eacute;o kết hợp c&ugrave;ng họa tiết đầu trăn đ&iacute;nh đ&aacute; qu&yacute; snovakio lấp l&aacute;nh v&agrave; mạ v&agrave;ng 14k để tạo ra những tuyệt t&aacute;c xa xỉ, m&ecirc; đắm l&ograve;ng người.</p>

                <p>Sự s&aacute;ng tạo v&agrave; trau chuốt trong từng thiết kế đ&atilde; gi&uacute;p Moolez gửi đến qu&yacute; b&agrave;, qu&yacute; c&ocirc; đang hoạt động tr&ecirc;n c&aacute;c lĩnh vực nghề nghiệp những lựa chọn đa dạng, vượt mọi khu&ocirc;n ph&eacute;p hay h&igrave;nh mẫu. Đ&acirc;y cũng l&agrave; th&ocirc;ng điệp Moolez muốn đồng h&agrave;nh c&ugrave;ng ph&aacute;i đẹp t&igrave;m thấy v&agrave; tự tin, tỏa s&aacute;ng với h&igrave;nh ảnh ho&agrave;n hảo nhất, phi&ecirc;n bản duy nhất của ch&iacute;nh m&igrave;nh.</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'gioi-thieu',
                'order' => '17',
                'category_id' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '18',
                'name' => 'About text',
                'avatar' => '',
                'description' => '<p>About text</p>',
                'detail' => '<p>Moolez kh&ocirc;ng chỉ tạo n&ecirc;n gi&agrave;y, d&eacute;p, t&uacute;i x&aacute;ch, phụ kiện... ,m&agrave; tạo n&ecirc;n &quot;nghệ thu&acirc;t&quot;. Phong c&aacute;ch Moolez kh&aacute;c biệt ở chỗ, trở th&agrave;nh một hướng đạo sinh cho kh&aacute;ch h&agrave;ng đi t&igrave;m bản ng&atilde; của cuộc sống. sự tự tin trong t&acirc;m hồm v&agrave; đặt điểm mốc nổi bật cho c&aacute; t&iacute;nh ri&ecirc;ng biệt.</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'about-text',
                'order' => '18',
                'category_id' => '1',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '19',
                'name' => 'Weekend Lookbook',
                'avatar' => 'business-woman.png',
                'description' => '<p>bussiness women</p>',
                'detail' => '<p>Use this text to share information about your brand with your customers. Describe a product, share announcements, or welcome customers to your store.</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'weekend-lookbook',
                'order' => '19',
                'category_id' => '16',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
        DB::table('articles')->insert(
            [
                'id' => '20',
                'name' => 'travel in style',
                'avatar' => 'men-style.png',
                'description' => '<p>travel in style</p>',
                'detail' => '<p>Use this text to share information about your brand with your customers. Describe a product, share announcements, or welcome customers to your store.</p>',
                'is_new' => '1',
                'is_highlight' => '1',
                'is_public' => '1',
                'slug' => 'travel-in-style',
                'order' => '20',
                'category_id' => '16',
                'updated_at' => '2019-11-18 00:54:54',
                'created_by' => '1'
            ]
        );
    }
}
