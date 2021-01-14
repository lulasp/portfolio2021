<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    public $table = 'status';


    public function pat(){

      return $this->belongsTo(PAT::class);
    }

    public function pats(){
      return $this->hasMany(PAT::class);
    }
}
