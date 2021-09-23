<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street','building','floor','apartment', 'landmark','areaId'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
