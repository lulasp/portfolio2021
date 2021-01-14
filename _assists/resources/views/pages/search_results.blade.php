@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fast luza Equipment - Resultados</div>

        <div class="panel-body">

          <!--TABLE-->

          <div class="row">
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Resultados da pesquisa</h5>
                </div>
                <div class="ibox-content">
                    <h4>P.A.T's</h4>
                  <div class="table-responsive">
                    @if(count($pat) === 0)
                    <p>No results found.
                      @elseif(count($pat>=1))
                      <table class="table table-striped table-bordered table-hover " id="editable" >
                        <thead>
                          <tr>
                            <th>P.A.T</th>
                            <th>Cliente</th>
                            <th>Equipamento</th>
                            <th>Marca</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th>Descrição</th>
                            <th>Notas</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($pat as $pat)
                          <tr>
                            <td><a href="/pats/{{$pat->id}}">{{$pat->id}}</a></td>
                            <td>{{$pat->idequipamento}}</td>
                            <td>{{$pat->idequipamento}}</td>
                            <td>{{$pat->idequipamento}}</td>
                            <td>{{$pat->status_id}}</td>
                            <td>{{$pat->data}}</td>
                            <td>{{$pat->descricaoAvaria}}</td>
                            <td>{{$pat->notas}}</td>
                          </tr>
                          @endforeach
                        </tbody>

                      </table>
                      <div class="pagination" align="center"> </div>

                      @endif

                    </div>

                    <h4>P.A.T.F's</h4>

                    <div class="table-responsive">
                      @if(count($patf) === 0)
                      <p>No results found.
                        @elseif(count($patf>=1))
                        <table class="table table-striped table-bordered table-hover " id="editable" >
                          <thead>
                            <tr>
                              <th>P.A.T.F</th>
                              <th>P.A.T</th>
                              <th>Cliente</th>
                              <th>Equipamento</th>
                              <th>Marca</th>
                              <th>Fornecedor</th>
                              <th>Data de Envio</th>
                              <th>Anexo</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($patf as $patf)
                            <tr>
                              <td><a href="/patsf/{{$patf->id}}">{{$patf->id}}</a></td>
                              <td><a href="#">{{$patf->pat_id}}</a></td>
                              <td>Cliente</td>
                              <td>Equipamento</td>
                              <td>Marca</td>
                              <td>Fornecedor</td>
                              <td>{{$patf->dataEnvioFornecedor}}</td>
                              @if(!empty($patf->docEnvioPath))
                              <td><a href="{{asset ('uploads/' . $patf->docEnvioPath)}}"><i class="fa fa-file-pdf-o text-navy"></i></a></td>
                              @else
                              <td>N/A</td>
                              @endif

                            </tr>
                            @endforeach
                          </tbody>

                        </table>
                        @endif
                      </div>

                      <h4>Clientes</h4>

                      <div class="table-responsive">
                        @if(count($cliente) === 0)
                        <p>No results found.
                          @elseif(count($cliente>=1))
                          <table class="table table-striped table-bordered table-hover " id="editable" >
                            <thead>
                              <tr>
                                <th>Cliente</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Fax</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($cliente as $cliente)
                              <tr>
                                <td><a href="/clientes/{{$cliente->id}}">{{$cliente->nome}}</a></td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->telefone}}</td>
                                <td>{{$cliente->fax}}</td>
                              </tr>
                              @endforeach
                            </tbody>

                          </table>
                          @endif
                        </div>

                        <h4>Equipamentos</h4>

                        <div class="table-responsive">
                          @if(count($equipamento) === 0)
                          <p>No results found.
                            @elseif(count($equipamento>=1))
                            <table class="table table-striped table-bordered table-hover " id="editable" >
                              <thead>
                                <tr>
                                  <th>Nº Serie</th>
                                  <th>Marca</th>
                                  <th>Cliente</th>
                                  <th>Descrição</th>
                                  <th>Categoria</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($equipamento as $equipamento)
                                <tr>
                                  <td><a href="/equipamentos">{{$equipamento->nserie}}</a></td>
                                  <td><a href="#">{{$equipamento->marca_id}}</a></td>
                                  <td><a href="#">{{$equipamento->cliente_id}}</a></td>
                                  <td>{{$equipamento->descricao}}</td>
                                  <td><a href="#">{{$equipamento->idCategoria}}</a></td>

                                </tr>
                                @endforeach
                              </tbody>

                            </table>
                            @endif
                          </div>

                          <h4>Fornecedores</h4>

                          <div class="table-responsive">
                            @if(count($fornecedor) === 0)
                            <p>No results found.
                              @elseif(count($fornecedor>=1))
                              <table class="table table-striped table-bordered table-hover " id="editable" >
                                <thead>
                                  <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Fax</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($fornecedor as $fornecedor)
                                  <tr>
                                    <td><a href="/fornecedores/{{$fornecedor->id}}">{{$fornecedor->nome}}</a></td>
                                    <td>{{$fornecedor->email}}</td>
                                    <td>{{$fornecedor->telefone}}</td>
                                    <td>{{$fornecedor->fax}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>

                              </table>
                              @endif
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
