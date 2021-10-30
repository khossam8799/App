<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'stateId'
    ];

    public function areas()
    {
        return $this->hasMany(Area::class,'cityId');
    }

    public function state()
    {
        return $this->belongsTo(State::class,'stateId');
    }
}
