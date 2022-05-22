<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
  use SoftDeletes;

  protected $guarded = [];
  protected $table = 'posts';

  public function category() {
      return $this->belongsTo('App\Category', 'category_id');
  }

  public function tags(){
    return $this->belongsToMany('App\Tags');
  }

}
