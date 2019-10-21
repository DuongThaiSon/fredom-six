<?php

namespace App\Http\Services\Traits;

use Illuminate\Http\Request;

trait HandleButtonDisplay
{
    public function IsPublic($db, $request)
    {
        $db->is_public = ($request->value == 1) ? '0' : '1';
        $db->save();
    }

    public function IsHighlight($db, $request)
    {
        $db->is_highlight = ($request->value == 1) ? '0' : '1';
        $db->save();
    }

    public function IsNew($db, $request)
    {
        $db->is_new = ($request->value == 1) ? '0' : '1';
        $db->save();
    }
}
