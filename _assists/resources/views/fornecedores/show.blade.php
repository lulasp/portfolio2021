
@extends('layouts.app')

@section('content')


<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Fornecedores</div>

        <div class="panel-body">
          <h2>P.A.T Fornecedor de {{$fornecedor->nome}}</h2>

          <hr>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="editable">
              <thead>
                <tr>
                  <th class="text-center">P.A.T Fornecedor</th>
                  <th class="text-center">P.A.T</th>
                  <th class="text-center">Cliente</th>
                  <th class="text-center">Equipamento</th>
                  <th class="text-center">Fornecedor</th>
                  <th class="text-center">Data de Envio</th>
                  <th class="text-center">Anexo</th>
                  <th class="text-center">Data de recepção</th>
                  <th class="text-center">Editar</th>
                  <th class="text-center">Apagar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($fornecedor->patsf as $patf)
                <tr>
                  <td><a href="/patsf/{{$patf->id}}">{{$patf->id}}</a></td>
                  <td><a href="/pats/{{$patf->pat->id}}">{{$patf->pat->id}}</a></td>
                  <td><a href="/clientes/{{$patf->pat->equipamento->first()->cliente->id}}">{{$patf->pat->equipamento->first()->cliente->nome}}</a></td>
                  <td><a href="/equipamentos/{{$patf->pat->equipamento->first()->id}}">{{$patf->pat->equipamento->first()->nserie}}</a></td>
                  <td>{{$patf->fornecedor->nome}}</td>
                  <td>{{$patf->dataEnvioFornecedor}}</td>
                  @if(!empty($patf->docEnvioPath))
                  <td><a href="{{asset ('uploads/' . $patf->docEnvioPath)}}"><i class="fa fa-file-pdf-o text-navy"></i></a></td>
                  @else
                  <td>N/A</td>
                  @endif
                  <td>{{$patf->dataRecepcao}}</td>
                  <td><a href="/patsf/{{$patf->id}}/edit"><i class="fa fa-edit text-navy"></i></a></td>
                  <td><a href="/patsf/{{$patf->id}}/destroy" onclick="return confirm('Apagar o P.A.T {{$patf->id}} ?');"><i class="fa fa-trash text-navy"></i></a></td>

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

<!-- Mainly scripts -->


<!-- Page-Level Scripts -->
<script>
$(document).ready(function() {
  $('.dataTables-example').DataTable({
    "dom": 'lTfigt',
    "tableTools": {
      "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
    }
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
  } );


});

</script>

@stop
