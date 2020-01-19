<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class OrderProduct extends Model
{
    protected $table = 'order_products';
    protected $fillable = ['order_id','product_id','quantity'];
    public function orders () {
      return $this->belongsTo('App\Order');
    }
    public function product () {
      return $this->belongsTo('App\Product','product_id');
    }
}
