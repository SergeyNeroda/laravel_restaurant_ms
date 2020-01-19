<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name_supplier','status','city','address','tel'];
    // звязок один до багатьох з інгредієнтами
    public function ingredients () {
      return $this->hasMany('App\Ingredient');
    }
}
