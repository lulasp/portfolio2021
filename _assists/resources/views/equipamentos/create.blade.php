@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Equipamentos</div>

        <div class="panel-body">
          <h2> Inserir Equipamento </h2>

          <div>


            <div class="ibox-content">

              <form method="POST" class="form-horizontal" action="/equipamentos/store">

                <div class="form-group"><label class="col-sm-2 control-label">Nº de serie:</label>

                  <div class="col-sm-10"><input type="text" name="nserie" class="form-control"></div>

                </div>
                <div class="form-group">

                  {!! Form::Label('marca', 'Marca:', array('class'=> 'col-sm-2 control-label')) !!}
                  <div class="col-sm-10">
                    {!! Form::select('marca_id', $items2, null, ['class' => 'form-control m-b']) !!}
                  </div>
                </div>

                <div class="form-group">

                  {!! Form::Label('cliente', 'Cliente:', array('class'=> 'col-sm-2 control-label')) !!}
                  <div class="col-sm-10">
                    {!! Form::select('cliente_id', $items3, null, ['class' => 'form-control m-b']) !!}
                  </div>
                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Descrição:</label>

                  <div class="col-sm-10"><textarea style="resize:vertical" maxlength="255" name="descricao" class="form-control"></textarea></div>

                </div>
                <div class="form-group">

                  {!! Form::Label('categoria', 'Categoria:', array('class'=> 'col-sm-2 control-label')) !!}
                  <div class="col-sm-10">
                    {!! Form::select('idCategoria', $items, null, ['class' => 'form-control m-b']) !!}
                  </div>
                </div>

                <!--necessario para nao falhar-->
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <a href="/equipamentos"><button class="btn btn-primary" type="button">Cancelar</button></a>
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

@stop
