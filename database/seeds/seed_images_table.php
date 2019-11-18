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
                'order' => '1',
                'imageable_id' => '2',
                'imageable_type' => 'App\Models\Gallery'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '4',
                'name' => 'leotive5db0edb908622.png',
                'is_public' => '1',
                'order' => '2',
                'imageable_id' => '2',
                'imageable_type' => 'App\Models\Gallery'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '5',
                'name' => 'leotive5db0edc29593d.png',
                'is_public' => '1',
                'order' => '3',
                'imageable_id' => '2',
                'imageable_type' => 'App\Models\Gallery'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '6',
                'name' => 'leotive5db0edce84ec9.png',
                'is_public' => '1',
                'order' => '4',
                'imageable_id' => '2',
                'imageable_type' => 'App\Models\Gallery'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '7',
                'name' => 'ceo.png',
                'is_public' => '1',
                'order' => '5',
                'imageable_id' => '1',
                'imageable_type' => 'App\Models\Gallery'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '8',
                'name' => 'datran.png',
                'is_public' => '1',
                'order' => '6',
                'imageable_id' => '3',
                'imageable_type' => 'App\Models\Gallery'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '9',
                'name' => 'datran1.png',
                'is_public' => '1',
                'order' => '7',
                'imageable_id' => '3',
                'imageable_type' => 'App\Models\Gallery'
            ]
        );
        DB::table('images')->insert(
            [
                'id' => '10',
                'name' => 'datran2.png',
                'is_public' => '1',
                'order' => '8',
                'imageable_id' => '3',
                'imageable_type' => 'App\Models\Gallery'
            ]
        );
    }
}
