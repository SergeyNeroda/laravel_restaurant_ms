<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $fillable = ['code_unit','name_unit'];

    public function recipes() {
      return $this->hasMany('App\Recipe');
    }

}
