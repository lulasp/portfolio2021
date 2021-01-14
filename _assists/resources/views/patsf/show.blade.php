@extends('layouts.app')

@section('content')


<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Pedidos de Assistência Técnica Fornecedor</div>

        <div class="panel-body">

          <!--TABLE-->

          <div class="row">
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Pedido de Assistência Técnica ao Fornecedor  Nº {{$patf->id}} </h5>
                </div>
                <div class="ibox-content">


                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">

                    <thead>
                      <tr>
                        <th class="text-center">P.A.T Fornecedor</th>
                        <th class="text-center">P.A.T</th>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Nº de Serie</th>
                        <th class="text-center">Fornecedor</th>
                        <th class="text-center">Anexo</th>
                        <th class="text-center">Data de Envio</th>
                        <th class="text-center">Data de Recepção</th>
                      </tr>
                    </thead>

                    <tbody>

                      <tr>
                        <td>{{$patf->id}}</td>
                        <td><a href="/pats/{{$patf->pat->id}}">{{$patf->pat->id}}</a></td>
                        <td><a href="/clientes/{{$patf->pat->equipamento->first()->cliente->id}}">{{$patf->pat->equipamento->first()->cliente->nome}}</a></td>
                        <td><a href="/marcas/{{$patf->pat->equipamento->first()->marca->id}}">{{$patf->pat->equipamento->first()->marca->marca}}</a></td>
                        <td><a href="/equipamentos/{{$patf->pat->equipamento->first()->id}}">{{$patf->pat->equipamento->first()->nserie}}</a></td>
                        <td><a href="/fornecedores/{{$patf->fornecedor->id}}">{{$patf->fornecedor->nome}}</a></td>
                        @if(!empty($patf->docEnvioPath))
                        <td><a href="{{asset ('uploads/' . $patf->docEnvioPath)}}"><i class="fa fa-file-pdf-o text-navy"></i></a></td>
                        @else
                        <td>N/A</td>
                        @endif
                        <td>{{$patf->dataEnvioFornecedor}}</td>
                        <td>{{$patf->dataRecepcao}}</td>
                      </tr>

                    </tbody>


                  </table>

                </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>



@stop
