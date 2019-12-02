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
    }
}
