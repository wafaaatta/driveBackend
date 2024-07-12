<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =
        ['id','cart_id', 'user_id', 'status', 'total'];


   public function itemOrders()
   {
       return $this->hasMany(ItemOrder::class);
   }
   public function cart()
   {
       return $this->belongsTo(Cart::class);
   }
}