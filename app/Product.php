<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderProduct;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name','code','price','info','id_category','image','spl_price'];

    //звязок з таблицею рецептів
    public function recipes()
    {
        return $this->hasMany('App\Recipe');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','id_category', 'id');
    }
    public function orderproduct()
    {
        return $this->belongsToMany('App\OrderProduct','id');
    }

}
