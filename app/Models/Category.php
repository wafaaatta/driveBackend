<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','id'];

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class, 'category_sub_categories');
    }
    public function products(){
        $this->belongsToMany(Product::class);
    }
}