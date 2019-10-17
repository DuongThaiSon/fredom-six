<?php

namespace App\Http\Services\Admin;

use Illuminate\Http\Request;
use App\Models\Setting;
use Auth;


Class SettingService
{
    private $attributesEmailContent = [
        'id', 'name', 'send_when', 'need_value', 'detail'
    ];
    public function infoSetting($request)
    {
        $attributes = [
            'company_website_url', 'company_name', 'company_address', 'company_tel', 
            'company_hotline', 'company_mobile', 'company_email', 'company_facebook_url'
        ];
        $attributes = $request->only($attributes);
        return $attributes;
    }
    public function sendMail($request)
    {
        $attributes = [
            'email_smtp_server', 'email_smtp_port', 'email_smtp_user', 'email_smtp_pass',
            'email_smtp_name', 'email_smtp_email_address'
        ];
        $attributes = $request->only($attributes);
        return $attributes;
    }
    public function seo($request)
    {
        $attributes = [
            'seo_page_title', 'seo_meta_des', 'seo_meta_keywords',
            'seo_meta_copyright', 'seo_meta_author', 'seo_meta_page_topic'
        ];
        $attributes = $request->only($attributes);
        return $attributes;
    }
    public function emailContent($request)
    {
        $attributes = $request->only($this->attributesEmailContent);
        $attributes['language'] = session('lang', env('DEFAULT_LANG', 'vi'));
        $attributes['update_by'] = Auth::id();
        return $attributes;
    }
}