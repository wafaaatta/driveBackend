<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_sub_categories');
    }
}