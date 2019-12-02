<?php

use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filters')->insert(
            array(
                'id' => '1',
                'name' => 'Phong cách',
                'is_public' => '1',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => '2019-11-19 15:00:18',
            )
        );
        DB::table('filters')->insert(
            array(
                'id' => '2',
                'name' => 'Kiểu Mũi',
                'is_public' => '1',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => '2019-11-19 15:00:18',
            )
        );
        DB::table('filters')->insert(
            array(
                'id' => '3',
                'name' => 'Kiểu gót',
                'is_public' => '1',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => '2019-11-19 15:00:18',
            )
        );
        DB::table('filters')->insert(
            array(
                'id' => '4',
                'name' => 'Độ cao',
                'is_public' => '1',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => '2019-11-19 15:00:18',
            )
        );
    }
}
