@extends('layouts.app')

@section('content')

<head>
  <!-- CSS -->
  <link rel="stylesheet" href="{{ URL::asset('../public/css/plugins/footable/footable.core.css') }}">


</head>

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Pedidos de Assistência Técnica Fornecedores</div>

        <div class="panel-body">

          <!--TABLE-->

          <div class="row">
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Todos os Pedidos de Assistência Técnica aos Fornecedores</h5>
                </div>
                <div class="ibox-content">
                  <div class="row">
                    <a href="/patsf/create" class="btn btn-primary"><i class="fa fa-plus"></i>  Adicionar P.A.T Fornecedor</a>
                    <a href="/pats/create" class="btn btn-primary"><i class="fa fa-plus"></i>  Adicionar P.A.T</a>
                  </div>
                  <hr>

                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="editable">

                    <thead>
                      <tr>
                        <th class="text-center">P.A.T Fornecedor</th>
                        <th class="text-center">P.A.T</th>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">Equipamento</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Fornecedor</th>
                        <th class="text-center">Data de envio</th>
                        <th class="text-center">Anexos</th>
                        <th class="text-center">Data de recepção</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>

                      </tr>
                    </thead>


                    <tbody>
                      @foreach ($patsf as $patf)
                      <tr>
                        <td><a href="/patsf/{{$patf->id}}">{{$patf->id}}</a></td>
                        <td><a href="/pats/{{$patf->pat_id}}">{{$patf->pat->id}}</a></td>
                        <td><a href="/clientes/{{$patf->pat->equipamento->first()->cliente->id}}">{{$patf->pat->equipamento->first()->cliente->nome}}</a></td>
                        <td><a href="/equipamentos/{{$patf->pat->equipamento->first()->id}}">{{$patf->pat->equipamento->first()->nserie}}</a></td>
                        <td><a href="/marcas/{{$patf->pat->equipamento->first()->marca->id}}">{{$patf->pat->equipamento->first()->marca->marca}}</a></td>
                        <td><a href="/fornecedores/{{$patf->fornecedor->id}}">{{$patf->fornecedor->nome}}</a></td>
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
      </div>
    </div>
  </div>
</div>


<!--SCRIPTS HERE -->
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
