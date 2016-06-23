<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

  protected $fillable = array('name', 'notation');

  public function books() {
    return $this->hasMany('Book');
  }

  public function dictionaries() {
    return $this->hasMany('Dictionary');
  }
}
