@extends('layouts.app')

@section('content')



<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Pedidos de Assistência Técnica</div>

        <div class="panel-body">

          <!--TABLE-->

          <div class="row">
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Pedidos de Assistência Técnica: {{$pat->id}} </h5>
                </div>
                <div class="ibox-content">


                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">

                      <thead>
                        <tr>
                          <th class="text-center">P.A.T</th>
                          <th class="text-center">Cliente</th>
                          <th class="text-center">Equipamento</th>
                          <th class="text-center">Marca</th>
                          <th class="text-center">Categoria</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Data</th>
                          <th class="text-center">Descrição Avaria</th>
                          <th class="text-center">Notas</th>
                          <th class="text-center">Descrição Reparação</th>
                          <th class="text-center">Data Conclusão</th>
                          <th class="text-center">Utilizador</th>
                          <th class="text-center">Edit</th>
                          <th class="text-center">Delete</th>

                        </tr>
                      </thead>
                      <tbody>

                        <tr>
                          <td><a href="/pats/{{$pat->id}}">{{$pat->id}}</a></td>
                          <td><a href="/clientes/{{$pat->equipamento->first()->cliente->id}}">{{$pat->equipamento->first()->cliente->nome}}</a></td>
                          <td><a href="/equipamentos/{{$pat->equipamento->first()->id}}">{{$pat->equipamento->first()->nserie}}</a></td>
                          <td><a href="/marcas/{{$pat->equipamento->first()->marca->id}}">{{$pat->equipamento->first()->marca->marca}}</a></td>
                          <td><a href="/categorias/{{$pat->equipamento->first()->categoria->id}}">{{$pat->equipamento->first()->categoria->categoria}}</a></td>
                          <td><a href="/statuses/{{$pat->status->id}}">{{$pat->status->pat_status}}</a></td>
                          <td>{{$pat->data}}</td>
                          <td>{{$pat->descricaoAvaria}}</td>
                          <td>{{$pat->notas}}</td>
                          <td>{{$pat->descricaoReparacao}}</td>
                          <td>{{$pat->dataConclusao}}</td>
                          <td><a href="/users/{{$pat->user_id}}">{{$pat->user->name}}</a></td>
                          <td><a href="/pats/{{$pat->id}}/edit"><i class="fa fa-edit text-navy"></i></a></td>
                          <td><a href="/pats/{{$pat->id}}/destroy" onclick="return confirm('Apagar o P.A.T {{$pat->nomepat}} ?');"><i class="fa fa-trash text-navy"></i></a></td>
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
