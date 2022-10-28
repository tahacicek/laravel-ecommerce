<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','slug','description','image','meta_title','meta_description','meta_keyword','status','created_at','updated_at','id'];
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class, "category_id", "id");
    }

    public function brands(){
        return $this->hasMany(Brand::class, "category_id", "id")->where('status', 0);
    }
}
