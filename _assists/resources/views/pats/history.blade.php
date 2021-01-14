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
        <div class="panel-heading">Fastluza Equipment - Pedidos de Assistência Técnica</div>

        <div class="panel-body">

          <!--TABLE-->

          <div class="row">
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Pedidos de Assistência Técnica Resolvidos</h5>
                </div>
                <div class="ibox-content">
                  <div class="row">
                    <a href="/pats/create" class="btn btn-primary">Adicionar P.A.T <i class="fa fa-plus"></i></a>
                    <a href="/patsf/create" class="btn btn-primary">Adicionar P.A.T Fornecedor  <i class="fa fa-plus"></i></a>
                  </div>
                  <hr>

                  <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="editable">
                    <thead>
                      <tr>
                        <th class="text-center">P.A.T</th>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">Equipamento</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Descrição Avaria</th>
                        <th class="text-center">Notas</th>
                        <th class="text-center">Descrição Reparação</th>
                        <th class="text-center">Data Conclusão</th>

                      </tr>
                    </thead>


                    <tbody>
                      @foreach ($pats as $pat)
                      <tr>
                        <td><a href="/pats/{{$pat->id}}">{{$pat->id}}</a></td>
                        <td><a href="/clientes/{{$pat->equipamento->first()->cliente->id}}">{{$pat->equipamento->first()->cliente->nome}}</a></td>
                        <td><a href="/equipamentos/{{$pat->equipamento->first()->id}}">{{$pat->equipamento->first()->nserie}}</a></td>
                        <td><a href="/marcas/{{$pat->equipamento->first()->marca->id}}">{{$pat->equipamento->first()->marca->marca}}</a></td>
                        <td><a href="/statuses/{{$pat->status->id}}">{{$pat->status->pat_status}}</a></td>
                        <td>{{$pat->data}}</td>
                        <td>{{$pat->descricaoAvaria}}</td>
                        <td>{{$pat->notas}}</td>
                        <td>{{$pat->descricaoReparacao}}</td>
                        <td>{{$pat->dataConclusao}}</td>

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
