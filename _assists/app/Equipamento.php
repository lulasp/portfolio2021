<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{

    protected $fillable = [
      'nserie',
      'marca_id',
      'cliente_id',
      'descricao',
      'idCategoria'

    ];

public function pat(){

  return $this->belongsTo(PAT::class);
}

public function pats(){

  return $this->hasMany(PAT::class, 'idEquipamento', 'id');
}

public function categoria(){

  return $this->belongsTo(Categoria::class, 'idCategoria', 'id');
}

public function marca(){

  return $this->hasOne(Marca::class, 'id', 'marca_id');

}
public function cliente(){

  return $this->hasOne(Cliente::class, 'id', 'cliente_id');

}

}
