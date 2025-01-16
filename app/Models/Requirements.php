<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    protected $fillable = ['scholarship_id', 'requirements', 'status'];

    protected $casts = [
        'requirements' => 'array'
    ];

    public function scholars()
    {
        return $this->hasMany(Scholar::class);
    }
    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
}
