<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Auth;

class SettingController extends Controller
{
    public function infoSetting()
    {
        $setting = Setting::first();
        return view('admin.setting.infoSetting',compact('setting'));
    }
    public function postInfoSetting(Request $request)
    {
        $this->validate($request, [
        'company_website_url' => 'required', 
        'company_name' => 'required',
        'company_address' => 'required', 
        'company_tel' => 'required', 
        'company_hotline' => 'required',
        'company_mobile' => 'required',
        'company_email' => 'required',
        'company_facebook_url' => 'required'
        ]);

        $setting = Setting::first();
        $setting->company_website_url = $request->company_website_url;
        $setting->company_name = $request->company_name;
        $setting->company_address = $request->company_address;
        $setting->company_tel = $request->company_tel;
        $setting->company_hotline = $request->company_hotline;
        $setting->company_mobile = $request->company_mobile;
        $setting->company_email = $request->company_email;
        $setting->company_facebook_url = $request->company_facebook_url;
        $setting->save();
        return back()->with('success', 'Thiết lập thông tin thành công !');
    }
    public function sendmail()
    {
        $setting = Setting::first();
        return view('admin.setting.sendmail', compact('setting'));
    }
    public function postSendmail(Request $request)
    {
        $setting = Setting::first();
        $setting->email_smtp_server = $request->email_smtp_server;
        $setting->email_smtp_port = $request->email_smtp_port;
        $setting->email_smtp_user = $request->email_smtp_user;
        $setting->email_smtp_pass= $request->email_smtp_pass;
        $setting->email_smtp_name = $request->email_smtp_name;
        $setting->email_smtp_email_address = $request->email_smtp_email_address;
        $setting->save();
        return back()->with('success', 'Thiết lập Gửi email thành công !');
    }
    public function seo()
    {
        $setting = Setting::first();
        return view('admin.setting.seo', compact('setting'));
    }
    public function postSeo(Request $request)
    {
        $setting = Setting::first();
        $setting->seo_page_title = $request->seo_page_title;
        $setting->seo_meta_des = $request->seo_meta_des;
        $setting->seo_meta_keywords = $request->seo_meta_keywords;
        $setting->seo_meta_copyright= $request->seo_meta_copyright;
        $setting->seo_meta_author = $request->seo_meta_author;
        $setting->seo_meta_page_topic = $request->seo_meta_page_topic;
        $setting->save();
        return back()->with('success', 'Tối ưu hóa Seo thành công !');
    }
    public function emailContent()
    {

        return view('');
    }
}
