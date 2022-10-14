<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $fillable = [
        "category_id",
        "name",
        "slug",
        "brand",
        "small_description",
        "description",

        "original_price",
        "selling_price",
        "quantity",
        "trending",
        "status",

        "meta_title",
        "meta_description",
        "meta_keyword"
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, "product_id", "id");
    }

}
