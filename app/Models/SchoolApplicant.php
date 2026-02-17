<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolApplicant extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'organization',
        'stakeholder_group',
        'region',
        'statement_of_interest',
        'status',
    ];
}
