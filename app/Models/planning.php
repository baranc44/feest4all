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
            'user_id',
            'uren',
            'omschrijving',
            'voltooid',
            'datum',
            'created_at',
            'updated_at'
    ];
    public function project(){
        return $this->hasMany(Project::class);
    } 
    public function user(){
        return $this->hasMany(User::class);
    }
}
