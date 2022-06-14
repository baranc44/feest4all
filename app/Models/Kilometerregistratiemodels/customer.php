<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    public function customers(){
        return $this->hasMany(Customer::class);
    }

    protected $fillable = [
        'company_name', 'address', 'housenumber', 'postcode', 'city', 'phonenumber'
    ];
}
