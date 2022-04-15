<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected $primaryKey = 'id';
    
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
    public function uren(){
        return $this->hasMany(Uren::class);
    }
    public function projectproducten(){
        return $this->belongsTo(Projectproducten::class);
    }
    public function planning(){
        return $this->belongsTo(Planning::class);
    }
}