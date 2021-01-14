<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PAT extends Model
{

  public $table = 'pat';

  public static $columns =[

  ];

  protected $fillable = [
    'cliente_id',
    'idequipamento',
    'data',
    'status_id',
    'categoria_id',
    'descricaoAvaria',
    'notas',
    'descricaoReparacao',
    'dataConclusao'
  ];


  public function cliente(){

    return $this->belongsTo(Cliente::class);
  }



public function equipamento(){

  return $this->hasMany(Equipamento::class, 'id', 'idequipamento');
}

public function status(){

  return $this->hasOne(status::class, 'id', 'status_id');
}

public function categoria(){

  return $this->hasOne(Categoria::class, 'id', 'categoria_id');
}

public function patf(){

  return $this->hasOne(PATF::class, 'id');
}

public function user(){

  return $this->belongsTo(User::class, 'user_id', 'id');
}


}
