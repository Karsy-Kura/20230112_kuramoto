<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareBoolReturnTypeException;

class Todo extends Model
{
  use HasFactory;
  
  protected $guraded = ['id'];
  protected $fillable = ['content', 'tag_id'];

  function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  function tag()
  {
    return $this->belongsTo('App\Models\Tag');
  }
}
