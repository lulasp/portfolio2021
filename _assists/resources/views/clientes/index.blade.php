@extends('layouts.app')

@section('content')
<head>

  <!-- Data Tables -->
  <link rel="stylesheet" href="{{ URL::asset('../public/css/plugins/footable/footable.core.css') }}">

</head>
<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Clientes</div>

        <div class="panel-body">

          <!--TABLE-->

          <div class="row">
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Todos os Clientes</h5>
                </div>
                <div class="ibox-content">
                  <div class="">
                    <a href="/clientes/create" class="btn btn-primary">Adicionar cliente  <i class="fa fa-plus"></i></a>
                  </div>
                  <hr>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="editable">
                      <thead>
                        <tr>
                          <th class="text-center">Nome</th>
                          <th class="text-center">e-mail</th>
                          <th class="text-center">telefone</th>
                          <th class="text-center">fax</th>
                          <th class="text-center">Editar</th>
                          <th class="text-center">Apagar</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                          <td><a href="/clientes/{{$cliente->id}}">{{$cliente->nome}}</a></td>
                          <td>{{$cliente->email}}</td>
                          <td>{{$cliente->telefone}}</td>
                          <td>{{$cliente->fax}}</td>
                          <td><a href="/clientes/{{$cliente->id}}/edit"><i class="fa fa-edit text-navy"></i></a></td>
                          <td><a href="/clientes/{{$cliente->id}}/destroy" onclick="return confirm('Apagar o cliente {{$cliente->nome}} ?');"><i class="fa fa-trash text-navy"></i></a></td>
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
      </div>
    </div>
  </div>


  <!-- Mainly scripts -->


  <!-- Page-Level Scripts -->

</div>
<!--SCRIPTS HERE -->
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
