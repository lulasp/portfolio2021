@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fast luza Equipment - Pedidos de Assistência Técnica Fornecedor</div>

        <div class="panel-body">
          <h2> Inserir um Pedido de Assistência Técnica ao Fornecedor </h2>

          <div>


            <div class="ibox-content">

              <form method="POST" class="form-horizontal" action="/patsf/store" enctype="multipart/form-data">

                <div class="form-group">

                  {!! Form::Label('pat', 'P.A.T:', array('class'=> 'col-sm-2 control-label')) !!}
                  <div class="col-sm-10">
                    {!! Form::select('pat_id', $items, null, ['class' => 'form-control m-b']) !!}
                  </div>
                  <a href="javascript:toggleDiv('tablePATS');"><button class="btn btn-primary" id="btnPATS" type="button" style="margin-bottom: 25px;">Ver P.A.T's</button></a>
                  <div id="tablePATS" style="display:none;">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="editable">
                        <thead>
                          <tr>
                            <th class="text-center">P.A.T</th>
                            <th class="text-center">Cliente</th>
                            <th class="text-center">Equipamento</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Status</th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach ($pats as $pat)
                          <tr>
                            <td><a href="/pats/{{$pat->id}}">{{$pat->id}}</a></td>
                            <td><a href="/clientes/{{$pat->equipamento->first()->cliente->id}}">{{$pat->equipamento->first()->cliente->nome}}</a></td>
                            <td><a href="/equipamentos">{{$pat->equipamento->first()->nserie}}</a></td>
                            <td><a href="/marcas/{{$pat->equipamento->first()->marca->id}}">{{$pat->equipamento->first()->marca->marca}}</a></td>
                            <td><a href="/statuses/{{$pat->status->id}}">{{$pat->status->pat_status}}</a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>


                </div>

                <div class="form-group">

                  {!! Form::Label('fornecedor', 'Fornecedor:', array('class'=> 'col-sm-2 control-label')) !!}
                  <div class="col-sm-10">
                    {!! Form::select('idFornecedor', $items2, null, ['class' => 'form-control m-b']) !!}
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Data de envio:</label>
                  <div class="col-sm-10">
                    <div class='input-group date' id='datepicker1'>
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                      <input type='date' name="dataEnvioFornecedor" class="form-control" />
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Data de Recepção:</label>
                  <div class="col-sm-10">
                    <div class='input-group date' id='datepicker2'>
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                      <input type='date' name="dataRecepcao" class="form-control" />
                    </div>
                  </div>
                </div>
                {!! Form::Label('file', 'Anexo:', array('class'=> 'col-sm-2 control-label')) !!}

                {!! Form::file('file') !!}


                <!--necessario para nao falhar-->
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <a href="/patsf"><button class="btn btn-primary" type="button">Cancelar</button></a>
                    <button class="btn btn-primary" type="submit">Inserir</button>
                  </div>
                </div>

              </form>



          </div>

        </div>


      </div>


    </div>
  </div>
</div>
</div>

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
function toggleDiv(tablePATS) {

  $("#"+tablePATS).toggle();

}

$('#datepicker1').datepicker({
  format: 'yyyy-mm-dd'

});
$('#datepicker2').datepicker({
  format: 'yyyy-mm-dd'

});

</script>
@stop
