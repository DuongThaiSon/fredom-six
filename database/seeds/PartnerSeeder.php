<?php

use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partners')->insert(
            [
                'id' => '1',
                'name' => 'Theo cước phí chuyển phát dự kiến',
                'price' => '50000',
                'created_by' => '1',
                'updated_by' => '1',
                'created_at' => '2019-12-03 14:27:58',
                'updated_at' => '2019-12-03 14:27:58',
            ]
        );
    }
}
