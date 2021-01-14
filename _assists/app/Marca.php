<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{


  protected $fillable = [
    'marca'
  ];


  public $table = 'marcas';

  public function equipamento(){

    return $this->belongsTo(Equipamento::class, 'id', 'marca_id');

  }

  public function equipamentos(){

    return $this->hasMany(Equipamento::class, 'marca_id', 'id');
  }

}
