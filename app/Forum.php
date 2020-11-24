<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
  protected $table = 'forums';
  protected $fillable = [
      'name',
      'address',
      'mobile',
      'occupation',
      'photo',
      'status',
  ];
}
