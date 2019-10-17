<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
        return view('admin.setting.infoSetting',compact('setting'));
    }

    public function postInfoSetting(Request $request)
    {
        $setting = Setting::first();
        $attributes = $this->service->infoSetting($request);
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
        $attributes = $this->service->sendMail($request);
        $setting->fill($attributes);
        $setting->save();
        return back()->with('success', 'Lưu dữ liệu thành công !');
    }

    public function seo()
    {
        $setting = Setting::first();
        return view('admin.setting.seo', compact('setting'));
    }

    public function postSeo(Request $request)
    {
        $setting = Setting::first();
        $attributes = $this->service->seo($request);
        $setting->fill($attributes);
        $setting->save();
        return back()->with('success', 'Lưu dữ liệu thành công !');
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
        $attributes = $this->service->emailContent($request);
        $email_content = EmailContent::create($attributes);
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
        $attributes = $this->service->emailContent($request);
        $email_content->fill($attributes);
        $email_content->save();
        return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
    }
}
