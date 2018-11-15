<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barberbooking extends Model
{
  protected $table = 'barberbooking';

  public function service()
  {
    return $this->hasOne('App\Barberservice', 'id', 'sid');
  }
}
