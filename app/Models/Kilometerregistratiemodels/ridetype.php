<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ridetype extends Model
{
    use HasFactory;

    public function ridetypes(){
        return $this->hasMany(Ridetype::class);
    }

    protected $fillable = [
        'type'
    ];
}
