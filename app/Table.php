<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = ['name'];
    //зв'язок з таблицею покупок
    public function orders () {
      return $this->hasMany('App\Order');
    }
}
