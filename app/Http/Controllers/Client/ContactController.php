<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
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
}
