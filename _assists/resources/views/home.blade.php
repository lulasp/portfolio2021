@extends('layouts.app')

@section('content')


<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-lg-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <a href="/pats"><span class="label label-success pull-right">P.A.T's</span></a>
          <h5>P.A.T's</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{$count}}</h1>
          <small>Nº de P.A.T's</small>

        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <a href="/patsf"><span class="label label-info pull-right">P.A.T's F.</span></a>
          <h5>P.A.T's Fornecedor</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{$countPATF}}</h1>
          <small>Nº de P.A.T's Fornecedor</small>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <a href="/clientes"><span class="label label-primary pull-right">Clientes</span></a>
          <h5>Clientes</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{$countClientes}}</h1>
          <small>Nº de Clientes</small>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <a href="/equipamentos"><span class="label label-danger pull-right">Equipamentos</span></a>
          <h5>Equipamentos</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{$countEquipamentos}}</h1>
          <small>Nº de Equipamentos</small>
        </div>
      </div>
    </div>
  </div>


  <div class="col-lg-12">


    <div class="row">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Últimos 6 P.A.T's</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
              <a class="close-link">
                <i class="fa fa-times"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                  <tr>
                    <th class="text-center">P.A.T</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Equipamento</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Data</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pats as $pat)
                  <tr>
                    <td><a href="/pats/{{$pat->id}}">{{$pat->id}}</a></td>
                    <td><a href="/clientes/{{$pat->equipamento->first()->cliente->id}}">{{$pat->equipamento->first()->cliente->nome}}</a></td>
                    <td><a href="/equipamentos/{{$pat->equipamento->first()->id}}">{{$pat->equipamento->first()->nserie}}</a></td>
                    <td><a href="/statuses/{{$pat->status->id}}">{{$pat->status->pat_status}}</a></td>
                    <td>{{$pat->data}}</td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>

    </div>
    <div class="row">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Últimos 6 P.A.T's Fornecedor</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
              <a class="close-link">
                <i class="fa fa-times"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                  <tr>
                    <th class="text-center">P.A.T Fornecedor</th>
                    <th class="text-center">P.A.T</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Fornecedor</th>
                    <th class="text-center">Data de Envio</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($patsf as $patf)
                  <tr>
                    <td><a href="/patsf/{{$patf->id}}">{{$patf->id}}</a></td>
                    <td><a href="/pats/{{$patf->pat_id}}">{{$patf->pat->id}}</a></td>
                    <td><a href="/clientes/{{$patf->pat->equipamento->first()->cliente->id}}">{{$patf->pat->equipamento->first()->cliente->nome}}</a></td>
                    <td><a href="/fornecedores/{{$patf->fornecedor->id}}">{{$patf->fornecedor->nome}}</a></td>
                    <td>{{$patf->dataEnvioFornecedor}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

    <div class="row">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Últimos 6 Equipamentos</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
              <a class="close-link">
                <i class="fa fa-times"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                  <tr>
                    <th class="text-center">Nº de Serie</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Categoria</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($equipamento as $equipamento)
                  <tr>
                    <td><a href="/equipamentos/{{$pat->equipamento->first()->id}}">{{$equipamento->nserie}}</a></td>
                    <td><a href="/marcas/{{$equipamento->marca->id}}">{{$equipamento->marca->marca}}</a></td>
                    <td><a href="/clientes/{{$equipamento->cliente->id}}">{{$equipamento->cliente->nome}}</a></td>
                    <td><a href="/categorias/{{$equipamento->categoria->id}}">{{$equipamento->categoria->categoria}}</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>

  </div>


</div>


<!-- Page-Level Scripts -->
<script>
$(document).ready(function() {

  $('.dataTables-example').DataTable({

  });

  /* Init DataTables */
  var oTable = $('#editable').DataTable();

  /* Apply the jEditable handlers to the table */
  oTable.$('td').editable( '../example_ajax.php', {
    "callback": function( sValue, y ) {
      var aPos = oTable.fnGetPosition( this );
      oTable.fnUpdate( sValue, aPos[0], aPos[1] );
    },
    "submitdata": function ( value, settings ) {
      return {
        "row_id": this.parentNode.getAttribute('id'),
        "column": oTable.fnGetPosition( this )[2]
      };
    },

    "width": "90%",
    "height": "100%"
  });


});

</script>


@stop
