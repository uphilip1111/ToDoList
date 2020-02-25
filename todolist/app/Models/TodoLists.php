<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoLists extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'attachment', 'done_at', 'deleted_at'
    ];
}
