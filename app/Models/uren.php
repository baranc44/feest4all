<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uren extends Model
{
    protected $table = 'uren';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'project_id',
        'member_id',
        'uren',
        'omschrijving',
        'datum',
        'gefactureerd',
        'factuur_nummer',
        'created_at'
    ];
}
