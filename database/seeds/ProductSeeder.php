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
                'avatar' => '/media/images/products/clothe.png',
                'unit' => 'cái',
                'product_code' => 'AS',
                'weight' => '100',
                'sku' => 'AS1',
                'description' => '<p>Áo silica</p>',
                'detail' => '<table>
                            <tbody>
                                <tr>
                                    <td>
                                    <p>Chất liệu: Da trăn&nbsp; &nbsp; &nbsp;</p>

                                    <p>M&agrave;u sắc: Đen</p>
                                    </td>
                                    <td>
                                    <p>Xuất xứ: Việt Nam</p>

                                    <p>K&iacute;ch thước: 39&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p>&nbsp;</p>

                        <p>M&ocirc; tả:&nbsp;Sẽ thật tuyệt vời nếu n&agrave;ng kết hợp c&ugrave;ng trang phục v&agrave; phụ kiện c&ugrave;ng m&agrave;u hoặc c&oacute; gam m&agrave;u trắng, đen.....tới nơi l&agrave;m việc hay xuống phố.&nbsp;</p>',
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
                'avatar' => '/media/images/products/short.png',
                'unit' => 'cái',
                'product_code' => 'QS',
                'weight' => '100',
                'sku' => 'QS2',
                'description' => '<p>Quần short</p>',
                'detail' => '<table>
                            <tbody>
                                <tr>
                                    <td>
                                    <p>Chất liệu: Da trăn&nbsp; &nbsp; &nbsp;</p>

                                    <p>M&agrave;u sắc: Đen</p>
                                    </td>
                                    <td>
                                    <p>Xuất xứ: Việt Nam</p>

                                    <p>K&iacute;ch thước: 39&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p>&nbsp;</p>

                        <p>M&ocirc; tả:&nbsp;Sẽ thật tuyệt vời nếu n&agrave;ng kết hợp c&ugrave;ng trang phục v&agrave; phụ kiện c&ugrave;ng m&agrave;u hoặc c&oacute; gam m&agrave;u trắng, đen.....tới nơi l&agrave;m việc hay xuống phố.&nbsp;</p>',
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
                'avatar' => '/media/images/products/item.png',
                'unit' => 'đôi',
                'product_code' => 'KT',
                'weight' => '100',
                'sku' => 'KT3',
                'description' => '<p>Khuyên tai</p>',
                'detail' => '<table>
                            <tbody>
                                <tr>
                                    <td>
                                    <p>Chất liệu: Da trăn&nbsp; &nbsp; &nbsp;</p>

                                    <p>M&agrave;u sắc: Đen</p>
                                    </td>
                                    <td>
                                    <p>Xuất xứ: Việt Nam</p>

                                    <p>K&iacute;ch thước: 39&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p>&nbsp;</p>

                        <p>M&ocirc; tả:&nbsp;Sẽ thật tuyệt vời nếu n&agrave;ng kết hợp c&ugrave;ng trang phục v&agrave; phụ kiện c&ugrave;ng m&agrave;u hoặc c&oacute; gam m&agrave;u trắng, đen.....tới nơi l&agrave;m việc hay xuống phố.&nbsp;</p>',
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
                'avatar' => '/media/images/products/watch.png',
                'unit' => 'cái',
                'product_code' => 'DH',
                'weight' => '100',
                'sku' => 'DH4',
                'description' => '<p>Đồng hồ</p>',
                'detail' => '<table>
                            <tbody>
                                <tr>
                                    <td>
                                    <p>Chất liệu: Da trăn&nbsp; &nbsp; &nbsp;</p>

                                    <p>M&agrave;u sắc: Đen</p>
                                    </td>
                                    <td>
                                    <p>Xuất xứ: Việt Nam</p>

                                    <p>K&iacute;ch thước: 39&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p>&nbsp;</p>

                        <p>M&ocirc; tả:&nbsp;Sẽ thật tuyệt vời nếu n&agrave;ng kết hợp c&ugrave;ng trang phục v&agrave; phụ kiện c&ugrave;ng m&agrave;u hoặc c&oacute; gam m&agrave;u trắng, đen.....tới nơi l&agrave;m việc hay xuống phố.&nbsp;</p>',
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
                'avatar' => '/media/images/products/glasses.png',
                'unit' => 'cái',
                'product_code' => 'K',
                'weight' => '100',
                'sku' => 'K5',
                'description' => '<p>Kính</p>',
                'detail' => '<table>
                            <tbody>
                                <tr>
                                    <td>
                                    <p>Chất liệu: Da trăn&nbsp; &nbsp; &nbsp;</p>

                                    <p>M&agrave;u sắc: Đen</p>
                                    </td>
                                    <td>
                                    <p>Xuất xứ: Việt Nam</p>

                                    <p>K&iacute;ch thước: 39&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p>&nbsp;</p>

                        <p>M&ocirc; tả:&nbsp;Sẽ thật tuyệt vời nếu n&agrave;ng kết hợp c&ugrave;ng trang phục v&agrave; phụ kiện c&ugrave;ng m&agrave;u hoặc c&oacute; gam m&agrave;u trắng, đen.....tới nơi l&agrave;m việc hay xuống phố.&nbsp;</p>',
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
                'avatar' => '/media/images/products/shoes.png',
                'unit' => 'đôi',
                'product_code' => 'ML',
                'weight' => '100',
                'sku' => 'ML6',
                'description' => '<p>Mules</p>',
                'detail' => '<table>
                            <tbody>
                                <tr>
                                    <td>
                                    <p>Chất liệu: Da trăn&nbsp; &nbsp; &nbsp;</p>

                                    <p>M&agrave;u sắc: Đen</p>
                                    </td>
                                    <td>
                                    <p>Xuất xứ: Việt Nam</p>

                                    <p>K&iacute;ch thước: 39&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p>&nbsp;</p>

                        <p>M&ocirc; tả:&nbsp;Sẽ thật tuyệt vời nếu n&agrave;ng kết hợp c&ugrave;ng trang phục v&agrave; phụ kiện c&ugrave;ng m&agrave;u hoặc c&oacute; gam m&agrave;u trắng, đen.....tới nơi l&agrave;m việc hay xuống phố.&nbsp;</p>',
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
                'avatar' => '/media/images/products/bag.png',
                'unit' => 'cái',
                'product_code' => 'TO',
                'weight' => '100',
                'sku' => 'TO7',
                'description' => '<p>Túi Orio</p>',
                'detail' => '<table>
                            <tbody>
                                <tr>
                                    <td>
                                    <p>Chất liệu: Da trăn&nbsp; &nbsp; &nbsp;</p>

                                    <p>M&agrave;u sắc: Đen</p>
                                    </td>
                                    <td>
                                    <p>Xuất xứ: Việt Nam</p>

                                    <p>K&iacute;ch thước: 39&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p>&nbsp;</p>

                        <p>M&ocirc; tả:&nbsp;Sẽ thật tuyệt vời nếu n&agrave;ng kết hợp c&ugrave;ng trang phục v&agrave; phụ kiện c&ugrave;ng m&agrave;u hoặc c&oacute; gam m&agrave;u trắng, đen.....tới nơi l&agrave;m việc hay xuống phố.&nbsp;</p>',
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
