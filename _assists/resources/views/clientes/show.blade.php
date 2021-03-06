
@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Clientes</div>

        <div class="panel-body">

          <h2><strong>Nome: {{$cliente->nome}}</strong></h2>
          <h3>E-mail: {{$cliente->email}}</h3>
          <h3>Telefone: {{$cliente->telefone}}</h3>
          <h3>Fax: {{$cliente->fax}}</h3>

          <div>
            <hr>
            <h4>Equipamentos de {{$cliente->nome}}</h4>

            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="editable">
                <thead>
                  <tr>
                    <th class="text-center">Nº de Serie</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Apagar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cliente->equipamento as $equipamento)
                  <tr>
                    <td><a href="/equipamentos/{{$equipamento->id}}">{{$equipamento->nserie}}</a></td>
                    <td><a href="/marcas/{{$equipamento->marca->id}}">{{$equipamento->marca->marca}}</a></td>
                    <td>{{$equipamento->cliente->nome}}</td>
                    <td>{{$equipamento->descricao}}</td>
                    <td><a href="/categorias/{{$equipamento->categoria->id}}">{{$equipamento->categoria->categoria}}</a></td>
                    <td><a href="/equipamentos/{{$equipamento->id}}/edit"><i class="fa fa-edit text-navy"></i></a></td>
                    <td><a href="/equipamentos/{{$equipamento->id}}/destroy" onclick="return confirm('Apagar o equipamento {{$equipamento->marca}} ?');"><i class="fa fa-trash text-navy"></i></a></td>
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

<!-- Mainly scripts -->


<!-- Custom and plugin javascript -->

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
