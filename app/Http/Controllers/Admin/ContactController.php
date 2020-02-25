<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Services\Admin\ContactService;

class ContactController extends Controller
{
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $statuses = Contact::STATUS;
        return view('admin.contact.index', compact('statuses'));
    }

    public function list(Request $request)
    {
        return $this->contactService->allWithDatatables($request->has('status') ? $request->status : []);
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        if ($contact->status === 'new') {
            $contact = $this->contactService->update(['status' => 'seen'], $id);
        }
        return response()->json(compact('contact'), 200);
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->only([
            'note', 'status'
        ]);
        $this->contactService->update($attributes, $id);
        return response()->json([], 204);
    }

    public function destroy($id)
    {
        $this->contactService->destroy($id);
        return response()->json([], 204);
    }

    public function destroyMany(Request $request)
    {
        if ($this->contactService->destroyMany($request->ids)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }
}
