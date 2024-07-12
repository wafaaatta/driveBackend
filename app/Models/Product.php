<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'price',
        'stock',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function itemOrder()
    {
        return $this->belongsTo(ItemOrder::class, 'product_id');
    }

}