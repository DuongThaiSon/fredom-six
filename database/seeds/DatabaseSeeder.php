<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(seed_setting_table::class);
        $this->call(seed_user_table::class);
        $this->call(seed_articles_table::class);
        $this->call(seed_categories_table::class);
        $this->call(seed_images_table::class);
        $this->call(GallerySeeder::class);
    }
}
