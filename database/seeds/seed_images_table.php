<?php

use Illuminate\Database\Seeder;

class seed_images_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(
            [
                'id' => '3',
                'name' => 'leotive5db0edaec781d.png',
                'is_public' => '1',
                'caption' => 'Use this text to share information about your brand with your customers.',
                'order' => '1',
                'imageable_id' => '2',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '4',
                'name' => 'leotive5db0edb908622.png',
                'is_public' => '1',
                'caption' => 'Use this text to share information about your brand with your customers.',
                'order' => '2',
                'imageable_id' => '2',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '5',
                'name' => 'leotive5db0edc29593d.png',
                'is_public' => '1',
                'caption' => 'Use this text to share information about your brand with your customers.',
                'order' => '3',
                'imageable_id' => '2',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '6',
                'name' => 'leotive5db0edce84ec9.png',
                'is_public' => '1',
                'caption' => 'Use this text to share information about your brand with your customers.',
                'order' => '4',
                'imageable_id' => '2',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '7',
                'name' => 'ceo.png',
                'is_public' => '1',
                'order' => '5',
                'imageable_id' => '1',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '8',
                'name' => 'datran.png',
                'is_public' => '1',
                'order' => '6',
                'imageable_id' => '3',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '9',
                'name' => 'datran1.png',
                'is_public' => '1',
                'order' => '7',
                'imageable_id' => '3',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '10',
                'name' => 'datran2.png',
                'is_public' => '1',
                'order' => '8',
                'imageable_id' => '3',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '11',
                'name' => 'inside.png',
                'is_public' => '1',
                'order' => '9',
                'imageable_id' => '4',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '12',
                'name' => 'brilliant-color.png',
                'is_public' => '1',
                'order' => '10',
                'imageable_id' => '4',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '13',
                'name' => 'color-company.png',
                'is_public' => '1',
                'order' => '11',
                'imageable_id' => '4',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '14',
                'name' => 'fashion-color.png',
                'is_public' => '1',
                'order' => '12',
                'imageable_id' => '4',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '15',
                'name' => 'king.png',
                'is_public' => '1',
                'order' => '13',
                'imageable_id' => '4',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '16',
                'name' => 'trend.png',
                'is_public' => '1',
                'order' => '14',
                'imageable_id' => '4',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '17',
                'name' => 'telenor.png',
                'is_public' => '1',
                'order' => '15',
                'imageable_id' => '4',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '18',
                'name' => 'SaleImage1.png',
                'is_public' => '1',
                'order' => '16',
                'imageable_id' => '5',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '19',
                'name' => 'SaleImage.png',
                'is_public' => '1',
                'order' => '17',
                'imageable_id' => '5',
                'imageable_type' => 'App\Models\Gallery',
                'created_by' => '1',
                'created_at' => '2019-11-19 02:23:57'
            ]
        );
    }
}
