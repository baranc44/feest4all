<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectproducten extends Model
{
    use HasFactory;

    protected $table = 'project_producten';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'project_id',
        'product_id',
        'hoeveelheid',
        'opgehaald',
        'gefactureerd',
        'afgeleverd',
        'opmerkingen'
    ];
    public function products(){
        return $this->hasMany('App\Models\product');
    }
}
