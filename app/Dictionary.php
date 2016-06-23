<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
  protected $fillable = array(
    'title',
    'subtitle',
    'image',
    'edition',
    'classification'
  );
  public function authors() {
    return $this->belongsToMany('App\Author');
  }
}
