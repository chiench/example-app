<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function review()
    {
        return $this->hasOne(Review::class, 'order_item_id');
    }
}
