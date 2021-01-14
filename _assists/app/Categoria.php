<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{


  protected $fillable = [
    'categoria'
  ];



  public $table = 'categoria';


  public function pat(){

    return $this->belongsTo(PAT::class, 'categoria_id');
  }

  public function equipamento(){

    return $this->hasMany(Equipamento::class, 'idCategoria');
  }


}
