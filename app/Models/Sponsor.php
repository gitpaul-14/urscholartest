<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = ['name', 'moa_file' ,'description', 'logo', 'created_by'];

    public function scholarship()
    {
        return $this->hasMany(Scholarship::class);
    }
}
