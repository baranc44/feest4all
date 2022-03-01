<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'naam',
        'id',
        'updated_at',
        'created_at'
    ];
}
