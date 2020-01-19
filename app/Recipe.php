<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['product_id','ingredient_id','quantity'];
    //звязую рецепт з інгредієнтом
    public function ingredient () {
      return $this->belongsTo('App\Ingredient');
    }
    //звязую рецепт з продуктом
    public function products () {
      return $this->belongsTo('App\Product');
    }
    //звязую рецепт з одиницею виміру
    public function unit () {
      return $this->belongsTo('App\Units');
    }

}
