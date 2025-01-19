<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmittedRequirements extends Model
{
    protected $fillable = ['scholar_id', 'submitted_requirements'];

    protected $casts = [
        'submitted_requirements' => 'array',
    ];
}
