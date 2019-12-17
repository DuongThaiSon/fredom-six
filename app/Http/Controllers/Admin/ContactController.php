<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Services\Admin\ContactService;

class ContactController extends Controller
{
    const PER_PAGE = 20;
    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $contacts = Contact::orderBy('id')->Paginate(self::PER_PAGE);
        return view('admin.contact.contact', compact('contacts'));
    }

    public function delete(Request $request)
    {
        $contact = Contact::findOrFail($request->id);
        $contact->delete();
        return redirect()->back()->with('win','Xóa dữ liệu thành công');
    }

    public function deleteAll(Request $request)
    {
        $deleted = $this->service->deleteAll($request->ids);
        if (!$deleted) {
            return redirect()->back()->with('fail','Không có dữ liệu để xóa.');
        }
        return redirect()->back()->with('win','Xóa dữ liệu thành công.');
    }
}
