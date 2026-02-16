<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TigwItem extends Model
{
    protected $fillable = [
        'title',
        'description',
        'display_order',
    ];
}
