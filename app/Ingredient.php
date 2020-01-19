<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name_ingredient','supplier_id'];

    //звязую інгредієнт з рецептом один до багатьох
    public function recipes() {
      return $this->hasMany('App\Recipe');
    }
    //звязую інгредієнт з постачальником 
    public function supplier () {
      return $this->belongsTo('App\Supplier');
    }
}
