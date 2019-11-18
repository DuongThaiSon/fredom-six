<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * 
     */
    public function contact(Request $request)
    {
        $attributes = $request->only([
            'name', 'email', 'phone', 'content'
        ]);
        $contact = new Contact($attributes);
        $contact->fill($attributes);
        $contact->save();
        return redirect()->route('client.showrooms.index')->with('success', 'Gửi liên hệ thành công');
    }
    /**
     * 
     */
    public function subscribe(Request $request)
    {
        $attributes = $request->only([
            'email'
        ]);
        $request->validate([
            'email' => 'required|email',
        ],
        [
            'email.email' => 'Email không hợp lệ',
            'email.required' => 'Bạn chưa điền vào email'
        ]
    );

        $subscribe = Contact::create($attributes);
        return redirect()->back()->with('success', 'Thank you subscribe moolez');
    }
}
