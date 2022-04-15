<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $table = "projects";

    protected $fillable = [
        "project_number",
        "name",
        "hourprice",
        "assortment",
        "order_amount",
        "invoice_type",
        "invoice_address",
        "created_at",
        "updated_at"
    ];

    public function uren() {
        return $this->hasMany(hours::class);
    }
}
