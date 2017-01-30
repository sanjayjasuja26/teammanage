<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
   protected $guarded = array();

  public function Dagination()
  {
      return $this->hasOne('App\Dagination','id','dagination_id');
  }
  public function Employdocement()
  {
      return $this->hasOne('App\Employdocement','employ_id','id');
  }
}
