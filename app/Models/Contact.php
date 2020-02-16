<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    const STATUS = [
        'new' => 'Mới',
        'seen' => 'Đã xem',
        'not_contactable' => 'Không thể liên hệ',
        'solved' => 'Đã giải quyết',
    ];

    protected $guarded = ['id'];
}
