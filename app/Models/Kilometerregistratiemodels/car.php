<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    public function car(){
        return $this->hasMany(Car::class);
    }

    protected $fillable = [
        'brand', 'kind', 'license', 'kilometerstand', 'total', 'totalthisyear', 'eersteonderhoud', 'aantalkeeronderhoud', 'onderhoudkilometers'
    ];
}
