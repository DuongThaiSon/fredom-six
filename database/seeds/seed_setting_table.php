<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class seed_setting_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'company_name' => 'LEOTIVE',
            'company_address'=> 'Company address',
            'company_website_url'=> 'http://www.leotive.com',
            'company_tel'=> '1900292976',
            'company_hotline'=> '1900292976',
            'company_mobile'=> '1900292976',
            'company_email'=> 'hi@leotive.com',
            'company_facebook_url'=> 'http://www.facebook.com/leotivepage/',
            'mailer_driver' => 'smtp',
            'mailer_host' => 'smtp.gmail.com',
            'mailer_port'=> '587',
            'mailer_from_name'=> 'LEOTIVE - Automatic email',
            'mailer_from_address'=> 'no-reply@leotive.com',
            'mailer_encryption'=> 'tls',
            'mailer_username'=> 'no-reply@leotive.com',
            'mailer_password'=> 'leotive123',
            'mailer_sendmail' => '/usr/sbin/sendmail -bs',
            'seo_page_title'=> 'LEOTIVE',
            'seo_meta_description'=> 'LEOTIVE',
            'seo_meta_keywords'=> 'LEOTIVE',
            'seo_meta_copyright'=> 'LEOTIVE',
            'seo_meta_author'=> 'LEOTIVE',
            'seo_meta_page_topic'=> 'LEOTIVE',
            'company_instagram_url'=> 'https://www.instagram.com/',
            'company_youtube_url'=> 'https://www.youtube.com/',
        );

        $order = count($data);
        foreach ($data as $key => $value) {
            DB::table('settings')->insertGetId([
                'key' => $key,
                'display_name' => Str::title(str_replace("_", " ", $key)),
                'value' => $value,
                'order' => $order--
            ]);
        }

    }
}
