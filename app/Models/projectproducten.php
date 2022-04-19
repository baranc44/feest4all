<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectproducten extends Model
{
    use HasFactory;

    protected $table = "projectproductens";

    protected $fillable = [
        "project_id",
        "product_id",
        "amount",
        "delivered",
        "picked_up",
        "invoiced",
        "comments",
        "created_at",
        "updated_at"
    ];
}
