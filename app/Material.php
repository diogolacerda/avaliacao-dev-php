<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  protected $fillable = array(
    'type_id',
    'title',
    'subtitle',
    'image',
    'isbn',
    'number_of_pages',
    'edition',
    'classification',
    'resume'
  );

  public function type() {
    return $this->belongsTo('App\Type');
  }

  public function authors() {
    return $this->belongsToMany('App\Author');
  }
}
