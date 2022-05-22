<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
  protected $guarded = [];
  protected $table = 'tags';

  public function post(){
    return $this->belongsToMany('App\Post');
  }
}
