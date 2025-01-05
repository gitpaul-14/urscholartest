<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = ['name', 'description', 'created_by'];

    public function scholars()
    {
        return $this->hasMany(Scholar::class);
    }
    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
