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
        <div class="panel-heading">Fastluza Equipment - Pedidos de Assistência Técnica</div>

        <div class="panel-body">
          <h2> Inserir um Pedido de Assistência Técnica</h2>

          <div>

            <div class="ibox-content">

              <form method="POST" class="form-horizontal" action="/pats/store">
                <div class="form-group"><label class="col-sm-2 control-label">P.A.T:</label>

                  <div class="col-sm-10"><input type="text" name="id" class="form-control" value="P.A.T: " readonly></div>

                </div>

                <div class="form-group">

                  {!! Form::Label('equipamento', 'Equipamento:', array('class'=> 'col-sm-2 control-label')) !!}
                  <div class="col-sm-10">
                    {!! Form::select('idequipamento', $items, null, ['class' => 'form-control m-b']) !!}

                  </div>
                  <a href="javascript:toggleDiv('tableEquipamento');"><button class="btn btn-primary" id="btnEquipamento" type="button" style="margin-bottom: 25px;">Ver Equipamentos</button></a>
                  <div id="tableEquipamento" style="display:none;">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="editable" >
                        <thead>
                          <tr>
                            <th class="text-center">Nº Serie</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Cliente</th>
                            <th class="text-center">Categoria</th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach ($equipamentos as $equipamento)
                          <tr>
                            <td><a href="/equipamentos">{{$equipamento->nserie}}</a></td>
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

                <div class="form-group">
                  <label class="col-sm-2 control-label">Data:</label>
                  <div class="col-sm-10">
                    <div class='input-group date' id='datepicker1'>
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                      <input type='date' name="data" class="form-control" />
                    </div>
                  </div>
                </div>

                <div class="form-group">

                  {!! Form::Label('status', 'Status:', array('class'=> 'col-sm-2 control-label')) !!}
                  <div class="col-sm-10">
                    {!! Form::select('status_id', $items2, null, ['class' => 'form-control m-b']) !!}
                  </div>
                </div>



                <div class="form-group"><label class="col-sm-2 control-label">Descrição da Avaria:</label>

                  <div class="col-sm-10"><textarea style="resize:vertical" name="descricaoAvaria" maxlength="255" class="form-control"></textarea></div>

                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Notas:</label>

                  <div class="col-sm-10"><textarea style="resize:vertical" name="notas" maxlength="255" class="form-control"></textarea></div>

                </div>
                <div class="form-group"><label class="col-sm-2 control-label">Descrição da Reparação:</label>

                  <div class="col-sm-10"><textarea style="resize:vertical" name="descricaoReparacao" maxlength="255" class="form-control"></textarea></div>

                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Data de conclusão:</label>
                  <div class="col-sm-10">
                    <div class='input-group date' id='datepicker2'>
                      <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </span>
                      <input type='date' name="dataConclusao" class="form-control" />
                    </div>
                  </div>
                </div>
                <!--necessario para nao falhar-->
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <a href="/pats"><button class="btn btn-primary" type="button">Cancelar</button></a>
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
function toggleDiv(tableEquipamento) {

  $("#"+tableEquipamento).toggle();

}


$('#datepicker1').datepicker({
  format: 'yyyy-mm-dd'

});
$('#datepicker2').datepicker({
  format: 'yyyy-mm-dd'

});

</script>
@stop
