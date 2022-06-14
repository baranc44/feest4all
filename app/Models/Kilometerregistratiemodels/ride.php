<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ride extends Model
{
    use HasFactory;

    public function car(){
        return $this->belongsTo(Car::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ridetype(){
        return $this->belongsTo(Ridetype::class);
    }

    protected $fillabel = [
        'user_id', 'customer_id', 'car_id', 'starting_kilometers', 'ending_kilometers', 'total_kilometers', 'ridetype_id', 'rideto', 'date', 'note', 'hidden'
    ];
}
