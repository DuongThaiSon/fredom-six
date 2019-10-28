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
                'parent_id' => '0',
                'order' => '2'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '2',
                'name' => 'News',
                'avatar' => 'media/articleCategories/leotive5dae5ec779879.jpeg',
                'description' => '<p>fasdfasdf</p>',
                'is_public' => '1',
                'is_new' => '1',
                'is_highlight' => '1',
                'parent_id' => '0',
                'type' => 'article',
                'order' => '1'
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
                'order' => '8'
            ]
        );
        DB::table('categories')->insert(
            [
                'id' => '7',
                'name' => 'News - Slide',
                'is_public' => '1',
                'is_new' => '1',
                'type' => 'gallery',
                'parent_id' => '0',
                'order' => '4'
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
                'order' => '3'
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
                'parent_id' => '0'
            ]
        );
    }
}
