<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class urenproducten extends Model
{
    public function uren_producten(){
        return $this->hasOne(uren::class);
    }
}
