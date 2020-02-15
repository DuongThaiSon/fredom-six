<?php

namespace App\Services\Admin;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ContactService
{
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function allWithDatatables(array $statuses = [])
    {
        $list = Contact::query();
        if (count($statuses)) {
            $list->whereIn('status', $statuses);
        }
        return DataTables::of($list)
            ->setRowClass(function ($user) {
                return 'ui-state-default';
            })
            ->make(true);
    }

    public function update(array $attributes, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->fill($attributes);
        $contact->save();
        return $contact;
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return true;
    }

    public function destroyMany(string $ids)
    {
        $ids = explode(",", $ids);
        Contact::destroy($ids);
        return true;
    }
}
