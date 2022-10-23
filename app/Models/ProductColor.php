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

    public function color()
    {
        return $this->belongsTo(Color::class, "color_id", "id");
    }
}
