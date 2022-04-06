<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;

    protected $fillable = [
        	'id',
            'project_id',
            'member_id',
            'uren',
            'omschrijving',
            'voltooid',
            'created_at',
            'updated_at'
    ];
}
