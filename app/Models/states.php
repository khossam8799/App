<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class states extends Model
{
    public function states()
    {
        return $this->hasMany(cities:class)
    }
    use HasFactory;
}
