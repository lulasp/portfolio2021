<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{

    public $table = 'fornecedores';


    protected $fillable = [
      'nome',
      'email',
      'telefone',
      'fax'
    ];

    public function patf(){

      return $this->belongsTo(PATF::class, 'id', 'idFornecedor');
    }

    public function patsf(){

      return $this->hasMany(PATF::class,'idFornecedor', 'id');
    }

}
