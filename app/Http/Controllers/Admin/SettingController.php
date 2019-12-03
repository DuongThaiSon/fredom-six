<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\EmailContent;
use App\Http\Services\Admin\SettingService;
use Auth;

class SettingController extends Controller
{
    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }

    public function infoSetting()
    {
        $setting = Setting::first();
        return view('admin.settings.infoSetting',compact('setting'));
    }

    public function postInfoSetting(Request $request)
    {
        $request->validate([
            'company_website_url' => 'required|url',
            'company_name' => 'required',
            'company_address' => '',
            'company_tel' => 'required|numeric|digits_between:10,100',
            'company_hotline' => 'numeric|digits_between:10,100',
            'company_mobile' => 'numeric|digits_between:10,100',
            'company_email' => 'email',
            'company_facebook_url' => 'url',
        ],
        [
            'company_website_url.url' => 'Tên miền không hợp lệ',
            'company_website_url.required' => 'Bạn chưa điền website công ty',
            'company_name.required' => 'Bạn chưa điền tên công ty',
            'company_tel.required' => 'Bạn chưa điền vào số điện thoại',
            'company_tel.numeric' => 'Điện thoại phải là số',
            'company_tel.digits_between'  => 'Số điện thoại phải có ít nhất 10 chữ số',
            'company_hotline.required' => 'Bạn chưa điền vào số điện thoại',
            'company_hotline.numeric' => 'Điện thoại phải là số',
            'company_hotline.digits_between' => 'Số điện thoại phải có ít nhất 10 chữ số',
            'company_mobile.required' => 'Bạn chưa điền vào số điện thoại',
            'company_mobile.numeric' => 'Điện thoại phải là số',
            'company_mobile.digits_between' => 'Số điện thoại phải có ít nhất 10 chữ số',
            'company_email.email' => 'Email không hợp lệ',
            'company_facebook_url.url' => 'Đường dẫn facbeook không hợp lệ',
        ]);
        $setting = Setting::first();
        $attributes = $this->service->infoSetting($request);
        $setting->fill($attributes);
        $setting->save();
        return back()->with('success', 'Thiết lập thông tin thành công !');
    }

    public function sendMail()
    {
        $setting = Setting::first();
        return view('admin.settings.sendmail', compact('setting'));
    }

    public function postSendMail(Request $request)
    {
        $request->validate([
            'email_smtp_server' => 'required',
            'email_smtp_port' => 'required|numeric',
            'email_smtp_user' => 'required',
            'email_smtp_pass' => 'required',
            'email_smtp_email_address' => 'email',
        ],
        [
            'email_smtp_server.required' => 'SMTP server address không được để trống',
            'email_smtp_port.required' => 'SMTP Port không được để trống',
            'email_smtp_port.numeric' => 'SMTP phải là số',
            'email_smtp_user.required' => 'Username không được để trống',
            'email_smtp_pass.required' => 'Password không được để trống',
            'email_smtp_email_address.email' => 'Email không hợp lệ',
        ]
    );
        $setting = Setting::first();
        $attributes = $this->service->sendMail($request);
        $setting->fill($attributes);
        $setting->save();
        return back()->with('success', 'Lưu dữ liệu thành công !');
    }

    public function seo()
    {
        $setting = Setting::first();
        return view('admin.settings.seo', compact('setting'));
    }

    public function postSeo(Request $request)
    {
        $request->validate([
            'seo_page_title' => 'required',
        ],
        [
            'seo_page_title.required' => 'Tiêu đề không được để trống',
        ]
    );
        $setting = Setting::first();
        $attributes = $this->service->seo($request);
        $setting->fill($attributes);
        $setting->save();
        return back()->with('success', 'Lưu dữ liệu thành công !');
    }

    public function emailContent()
    {
        $email_content = EmailContent::paginate(10);
        return view('admin.settings.emailContent', compact('email_content'));
    }

    public function addEmailContent()
    {
        return view('admin.settings.addEmailContent');
    }

    public function postAddEmailContent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            // 'need_value' => 'required'
        ],
        [
            'name.required' => 'Tiêu để không được để trống',
            'detail.required' => 'Nội dung không được để trống',
            // 'need_value.required' => 'Giá trị không được để trống'
        ]);
        $attributes = $this->service->emailContent($request);
        $email_content = EmailContent::create($attributes);
        return redirect()->route('admin.settings.emailContent')->with('success', 'Lưu dữ liệu thành công');
    }

    public function editEmailContent($id)
    {
        $email_content = EmailContent::find($id);
        return view('admin.settings.editEmailContent', compact('email_content'));
    }

    public function postEditEmailContent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ],
        [
            'name.required' => 'Tiêu để không được để trống',
            'detail.required' => 'Nội dung không được để trống'
        ]);
        $email_content = EmailContent::findOrFail($id);
        $attributes = $this->service->emailContent($request);
        $email_content->fill($attributes);
        $email_content->save();
        return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
    }
}
