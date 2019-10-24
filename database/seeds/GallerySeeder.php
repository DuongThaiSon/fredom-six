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
            ]
        );
        DB::table('galleries')->insert(
            [
                'id' => '3',
                'name' => 'introduce - About Slide',
                'is_public' => '1',
                'is_new' => '1',
                'category_id' => '8',
            ]
        );
    }
}
