<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PATF extends Model
{

  public $table = 'pat_fornecedor';

  protected $fillable = [
    'idFornecedor',
    'pat_id',
    'dataEnvioFornecedor',
    'dataRecepcao',
    'docEnvioPath'
  ];

  public function pat(){

    return $this->belongsTo(PAT::class);
  }

  public function fornecedor(){

    return $this->hasOne(Fornecedor::class, 'id', 'idFornecedor');
  }



}
