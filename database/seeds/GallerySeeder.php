<?php

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->insert(
            [
                'id' => '1',
                'name' => 'CEO',
                'is_public' => '1',
                'is_new' => '1',
                'is_highlight' => '1',
                'category_id' => '8',
                'order' => '1',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:21:29'
            ]
        );
        DB::table('galleries')->insert(
            [
                'id' => '2',
                'name' => 'Slide',
                'is_public' => '1',
                'is_new' => '1',
                'is_highlight' => '1',
                'category_id' => '7',
                'order' => '2',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:21:29'
            ]
        );
        DB::table('galleries')->insert(
            [
                'id' => '3',
                'name' => 'introduce - About Slide',
                'is_public' => '1',
                'is_new' => '1',
                'category_id' => '8',
                'order' => '3',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:21:29'
            ]
        );
        DB::table('galleries')->insert(
            [
                'id' => '4',
                'name' => 'Album partner',
                'is_public' => '1',
                'is_new' => '1',
                'category_id' => '17',
                'order' => '4',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:21:29'
            ]
        );
        DB::table('galleries')->insert(
            [
                'id' => '5',
                'name' => 'Hot sale',
                'is_public' => '1',
                'is_new' => '1',
                'category_id' => '18',
                'order' => '5',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:21:29'
            ]
        );
    }
}
