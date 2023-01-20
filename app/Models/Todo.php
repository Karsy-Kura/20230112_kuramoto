<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
  use HasFactory;
  
  protected $guraded = ['id'];
  protected $fillable = ['content', 'tag'];

  function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  function tag()
  {
    return $this->belongsTo('App\Models\Tag');
  }
}
