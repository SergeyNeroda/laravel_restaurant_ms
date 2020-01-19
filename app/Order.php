<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Product;
use App\Status;
use App\Table;
use App\OrderProduct;

//модель покупок
class Order extends Model
{
    protected $fillable = ['user_id','status_id','table_id','summ','created_at'];
    //зв'язок з таблицею користувачів
    public function user () {
      return $this->belongsTo('App\User');
    }
    //зв'язок з таблицею статусів
    public function status () {
      return $this->belongsTo('App\Status');
    }
    //зв'язок з таблицею столів
    public function table () {
      return $this->belongsTo('App\Table');
    }
    //зв'язок з таблицею куплених продуктів
    public function product () {
      return $this->belongsToMany('App\Product');
    }
    //зв'язок з таблицею куплених продуктів
    public function orderproduct () {
      return $this->hasMany('App\OrderProduct');
    }


}
