<?php

use Illuminate\Database\Seeder;

class seed_categories_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'id' => '1',
                'name' => 'Introduces',
                'is_public' => '1',
                'is_new' => '1',
                'is_highlight' => '1',
                'type' => 'article',
                'slug' => 'introduces',
                'parent_id' => '0',
                'order' => '2',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '2',
                'name' => 'News',
                'avatar' => 'leotive5dae5ec779879.jpeg',
                'description' => '<p>fasdfasdf</p>',
                'is_public' => '1',
                'is_new' => '1',
                'is_highlight' => '1',
                'parent_id' => '0',
                'type' => 'article',
                'slug' => 'san-pham-nu',
                'order' => '1',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '3',
                'name' => 'OUR WORK',
                'parent_id' => '1',
                'is_public' => '1',
                'is_new' => '1',
                'is_highlight' => '1',
                'parent_id' => '1',
                'type' => 'article',
                'slug' => 'out-work',
                'order' => '3',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '4',
                'name' => 'About Moolez',
                'is_public' => '1',
                'is_new' => '1',
                'is_highlight' => '1',
                'parent_id' => '1',
                'type' => 'article',
                'slug' => 'about-moolez',
                'order' => '8',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '7',
                'name' => 'News - Slide',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'gallery',
                'slug' => 'news-slide',
                'parent_id' => '0',
                'order' => '4',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        
        DB::table('categories')->insert(
            [
                'id' => '8',
                'name' => 'intro',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'gallery',
                'order' => '5',
                'parent_id' => '0',
                'slug' => 'intro',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '9',
                'name' => 'Sản phẩm nữ',
                'avatar' => 'leatherBag.png',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'product',
                'order' => '9',
                'slug' => 'san-pham-nu',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '10',
                'name' => 'Sản phẩm nam',
                'avatar' => 'leatherBag.png',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'product',
                'order' => '10',
                'slug' => 'san-pham-nam',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '11',
                'name' => 'Menu Top',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'menu',
                'order' => '11',
                'slug' => 'menu-top',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '12',
                'name' => 'Menu Bottom',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'menu',
                'order' => '12',
                'slug' => 'menu-bottom',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '13',
                'name' => 'Customer review',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'article',
                'order' => '13',
                'slug' => 'customer-review',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '14',
                'name' => 'Quote',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'article',
                'order' => '14',
                'slug' => 'quote',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '15',
                'name' => 'Mix & Match',
                'avatar' => 'shortJean.png',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'product',
                'order' => '15',
                'slug' => 'mix-match',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '16',
                'name' => 'Lookbook',
                'avatar' => '',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'article',
                'order' => '16',
                'slug' => 'lookbook',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '17',
                'name' => 'Partner',
                'avatar' => '',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'gallery',
                'order' => '17',
                'slug' => 'partner',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '18',
                'name' => 'Hot Sale',
                'avatar' => 'hot-sale.png',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'gallery',
                'order' => '18',
                'slug' => 'hot-sale',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '19',
                'name' => 'Luxury collection',
                'avatar' => 'leotive5dd49d99a911d.png',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'product',
                'order' => '19',
                'slug' => 'luxury-collection',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '20',
                'name' => 'Business collection',
                'avatar' => 'leotive5dd49e25d2791.png',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'product',
                'order' => '20',
                'slug' => 'business-collection',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '21',
                'name' => 'Classic collection',
                'avatar' => 'leotive5dd49e8fc1033.png',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'product',
                'order' => '21',
                'slug' => 'classic-collection',
                'parent_id' => '0',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:17:29'
            ]
        );
    }
}
