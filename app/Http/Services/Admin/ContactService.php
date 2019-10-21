<?php
namespace App\Http\Services\Admin;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactService
{
    public function deleteAll($ids)
    {
        if(empty($ids)) {
            return 0;
        }else {
            foreach ($ids as $id) {
                Contact::findOrFail($id)->delete();
            }
            return 1;
        }
        
    }
}