<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{


  protected $fillable = [
    'nome',
    'email',
    'telefone',
    'fax'
  ];

    public function pat(){

      return $this->hasMany(PAT::class, 'idequipamento', 'id');

    }
    public function equipamento(){

      return $this->hasMany(Equipamento::class, 'cliente_id');

    }

    public function pats(){

      return $this->belongsTo(PAT::class, 'id', 'idequipamento');

    }
}
