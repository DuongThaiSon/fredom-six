<?php

use Illuminate\Database\Seeder;

class seed_setting_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            array(
                'company_name' => 'LEOTIVE',
                'company_address'=> 'Company address',
                'company_website_url'=> 'http://www.leotive.com',
                'company_tel'=> '1900292976',
                'company_hotline'=> '1900292976',
                'company_mobile'=> '1900292976',
                'company_email'=> 'hi@leotive.com',
                'company_facebook_url'=> 'http://www.facebook.com/leotivepage/',
                'email_smtp_server'=> 'smtp.gmail.com',
                'email_smtp_port'=> '578',
                'email_smtp_user'=> 'no-reply@leotive.com',
                'email_smtp_pass'=> 'leotive123',
                'email_smtp_name'=> 'LEOTIVE - Automatic email',
                'email_smtp_email_address'=> 'no-reply@leotive.com',
                'seo_page_title'=> 'LEOTIVE',
                'seo_meta_des'=> 'LEOTIVE',
                'seo_meta_keywords'=> 'LEOTIVE',
                'seo_meta_copyright'=> 'LEOTIVE',
                'seo_meta_author'=> 'LEOTIVE',
                'seo_meta_page_topic'=> 'LEOTIVE',
                'company_instagram_url'=> 'https://www.instagram.com/',
                'company_youtube_url'=> 'https://www.youtube.com/',
            )
        );
    }
}
