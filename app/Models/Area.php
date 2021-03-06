<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'cityId' , 'hasAddresses'
    ];

    public function city()
    {
        return $this->belongsTo(City::class,'cityId');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'areaId');
    }
}
