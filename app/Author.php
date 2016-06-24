<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

  protected $fillable = array('name', 'notation');

  public function materials() {
    return $this->hasMany('Material');
  }


}
