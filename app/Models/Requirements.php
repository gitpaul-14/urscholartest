<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    protected $fillable = ['scholar_id', 'scholarship_id', 'requirements', 'submitted_requirements', 'application_start', 'deadline'];

    protected $casts = [
        'requirements' => 'array',
        'submitted_requirements' => 'array'
    ];

    public function scholars()
    {
        return $this->hasMany(Scholar::class);
    }
    public function scholarship()
    {
        return $this->hasMany(Scholarship::class);
    }
}
