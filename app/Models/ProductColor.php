<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{

    protected $table = "product_colors";

    use HasFactory;

    protected $fillable = [
        'product_id',
        'color_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
