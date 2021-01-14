<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{

  public function pat(){

    return $this->hasMany(PAT::class, 'id');
  }

}
