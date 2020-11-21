<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [
        'created_at', 'deleted_at', 'updated_at',
    ];
}
