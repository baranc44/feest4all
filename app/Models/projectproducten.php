<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectproducten extends Model
{
    use HasFactory;

    protected $table = 'project_producten';
    
    protected $fillable = [
        'id',
        'project_id',
        'product_id',
        'hoeveelheid',
        'afgeleverd'
    ];
}
