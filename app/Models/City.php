<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

    ];

    public function areas()
    {
        return $this->hasMany('App\Models\Area');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
}
