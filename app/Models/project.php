<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $table = 'project';
    
    protected $fillable = [
        'naam',
        'id',
        'project_nummer',
        'uurprijs',
        'verschotten',
        'opdrachtbedrag',
        'factuurtype',
        'factuuradres',
        'created_at'
    ];
}