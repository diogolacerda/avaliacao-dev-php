<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = array(
    'title',
    'subtitle',
    'image',
    'isbn',
    'number_of_pages',
    'resume'
  );

  public function authors() {
    return $this->belongsToMany('App\Author');
  }
}
