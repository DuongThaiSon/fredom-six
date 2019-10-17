<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'company_website_url', 'company_name', 'company_address', 'company_tel', 
    //     'company_hotline', 'company_mobile', 'company_email', 'company_facebook_url',
    //     'email_smtp_server', 'email_smtp_port', 'email_smtp_user', 'email_smtp_pass',
    //     'email_smtp_name', 'email_smtp_email_address',
    //     'seo_page_title', 'seo_meta_des', 'seo_meta_keywords',
    //     'seo_meta_copyright', 'seo_meta_author', 'seo_meta_page_topic'
    // ];
}
