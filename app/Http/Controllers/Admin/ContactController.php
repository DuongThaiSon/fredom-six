<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    const PER_PAGE = 20;
    public function index()
    {
        $contacts = Contact::orderBy('id')->Paginate(self::PER_PAGE);
        return view('admin.contact.contact', compact('contacts'));
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('win','Xóa dữ liệu thành công');
    }

    public function deleteAll(Request $request)
    {
        $contact = $request->id;
        if(empty($contact)) {
            return redirect()->back()->with('fail', 'Không có dữ liệu để xóa');
        }else {
            foreach ($contact as $id) {
                Contact::findOrFail($id)->delete();
            }
        }
        
        return redirect()->back()->with('win','Xóa dữ liệu thành công');
    }
}
