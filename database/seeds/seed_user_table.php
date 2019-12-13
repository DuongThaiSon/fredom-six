<?php

use Illuminate\Database\Seeder;

class seed_user_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                'email' => 'admin@leotive.com',
                'name' => 'LEOTIVE',
                'type' => 'ADMIN',
                'password' => bcrypt('leotive123')
            )
        );
        DB::table('users')->insert(
            array(
                'email' => 'SSE@leotive.com',
                'name' => 'SSE',
                'type' => 'MEMBER',
                'password' => bcrypt('leotive123'),
                'api_token' => 'PFDPD5k6IDiJQ5akw22diKN1MXCAMPYd3807G1eTwPCneGUU8rtcjpaV4XstLNACY9ZqLDGPx57RwRi9'
            )
        );
    }
}
