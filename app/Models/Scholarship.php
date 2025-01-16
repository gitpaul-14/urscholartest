<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = ['name', 'sponsor_id', 'school_year', 'scholarshipType',  'semester', 'status', 'created_by' ];

    public function scholars()
    {
        return $this->hasMany(Scholar::class);
    }
    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirements::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }
}
