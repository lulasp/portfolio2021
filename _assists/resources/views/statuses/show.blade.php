@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Status</div>

        <div class="panel-body">
          <h2> Status: {{$status->pat_status}} </h2>


          <div>
            <hr>
            <h4>Pedidos de Assistencia Tecnica</h4>

            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="editable">
                <thead>
                  <tr>
                    <th class="text-center">P.A.T</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Utilizador</th>
                    <th class="text-center">Equipamento</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Descrição da avaria</th>
                    <th class="text-center">Notas</th>
                    <th class="text-center">Descrição da reparação</th>
                    <th class="text-center">Data de conclusão</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Apagar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($status->pats as $pat)
                  <tr>
                    <td><a href="/pats/{{$pat->id}}">{{$pat->id}}</a></td>
                    <td><a href="/clientes/{{$pat->equipamento->first()->cliente->id}}">{{$pat->equipamento->first()->cliente->nome}}</a></td>
                    <td><a href="/users/{{$pat->user_id}}">{{$pat->user->name}}</a></td>
                    <td><a href="/equipamentos/{{$pat->equipamento->first()->id}}">{{$pat->equipamento->first()->nserie}}</a></td>
                    <td>{{$pat->data}}</td>
                    <td>{{$pat->status->pat_status}}</td>
                    <td><a href="/categorias/{{$pat->equipamento->first()->categoria->id}}">{{$pat->equipamento->first()->categoria->categoria}}</a></td>
                    <td>{{$pat->descricaoAvaria}}</td>
                    <td>{{$pat->notas}}</td>
                    <td>{{$pat->descricaoReparacao}}</td>
                    <td>{{$pat->dataConclusao}}</td>
                    <td><a href="/pats/{{$pat->id}}/edit"><i class="fa fa-edit text-navy"></i></a></td>
                    <td><a href="/pats/{{$pat->id}}/destroy" onclick="return confirm('Apagar o P.A.T ?');"><i class="fa fa-trash text-navy"></i></a></td>
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
