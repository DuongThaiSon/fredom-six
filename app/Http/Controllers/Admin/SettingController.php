<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\emailContent;
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
        $setting = Setting::first();
        $attributes = $request->only([
            'company_website_url', 'company_name', 'company_address', 'company_tel', 
            'company_hotline', 'company_mobile', 'company_email', 'company_facebook_url'
        ]);
        $setting->fill($attributes);
        $setting->save();
        return back()->with('success', 'Thiết lập thông tin thành công !');
    }
    public function sendMail()
    {
        $setting = Setting::first();
        return view('admin.setting.sendmail', compact('setting'));
    }
    public function postSendMail(Request $request)
    {
        $setting = Setting::first();
        $attributes = $request->only([
            'email_smtp_server', 'email_smtp_port', 'email_smtp_user', 'email_smtp_pass',
            'email_smtp_name', 'email_smtp_email_address'
        ]);
        $setting->fill($attributes);
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
        $attributes = $request->only([
            'seo_page_title', 'seo_meta_des', 'seo_meta_keywords',
            'seo_meta_copyright', 'seo_meta_author', 'seo_meta_page_topic'
        ]);
        $setting->fill($attributes);
        $setting->save();
        return back()->with('success', 'Tối ưu hóa Seo thành công !');
    }
    public function emailContent()
    {
        $email_content = EmailContent::paginate(10);
        return view('admin.setting.emailContent', compact('email_content'));
    }
    public function addEmailContent()
    {
        return view('admin.setting.addEmailContent');
    }
    public function postAddEmailContent(Request $request)
    {
        $email_content = new EmailContent();
        $attributes = $request->only([
            'id', 'name', 'send_when', 'need_value', 'detail'
        ]);
        $attributes['language'] = session('lang', env('DEFAULT_LANG', 'vi'));
        $attributes['update_by'] = Auth::id();
        $email_content->fill($attributes);
        $email_content->save();
        return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
    }
    public function editEmailContent($id)
    {
        $email_content = EmailContent::find($id);
        return view('admin.setting.editEmailContent', compact('email_content'));
    }
    public function postEditEmailContent(Request $request, $id)
    {
        $email_content = EmailContent::findOrFail($id);
        $attributes = $request->only([
            'id', 'name', 'send_when', 'need_value', 'detail'
        ]);
        $attributes['language'] = session('lang', env('DEFAULT_LANG', 'vi'));
        $attributes['update_by'] = Auth::id();
        $email_content->fill($attributes);
        $email_content->save();
        return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
    }
}
