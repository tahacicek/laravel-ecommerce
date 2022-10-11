<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','slug','description','image','meta_title','meta_description','meta_keyword','status','created_at','updated_at','id'];
    use HasFactory;
}
