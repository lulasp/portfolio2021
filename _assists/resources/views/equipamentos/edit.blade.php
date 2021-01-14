@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Equipamentos</div>

        <div class="panel-body">
          <h2> Editar Equipamento {{$equipamento->nserie}}</h2>

          <div>


            <div class="ibox-content">
              <form method="POST" class="form-horizontal" action="/equipamentos/{{$equipamento->id}}">
                {{method_field('PATCH')}}
                <div class="form-group"><label class="col-sm-2 control-label">Nº de serie:</label>

                  <div class="col-sm-10"><input type="text" name="nserie" class="form-control" value="{{$equipamento->nserie}}"></div>

                </div>
                <div class="form-group">

                  {!! Form::Label('marca', 'Marca:', array('class'=> 'col-sm-2 control-label')) !!}
                  <div class="col-sm-10">
                    {!! Form::select('marca_id', $items, $equipamento->marca_id, ['class' => 'form-control m-b']) !!}
                  </div>
                </div>

                <div class="form-group">

                  {!! Form::Label('cliente', 'Cliente:', array('class'=> 'col-sm-2 control-label')) !!}
                  <div class="col-sm-10">
                    {!! Form::select('cliente_id', $items2, $equipamento->cliente_id, ['class' => 'form-control m-b']) !!}
                  </div>
                </div>
                <div class="form-group"><label class="col-sm-2 control-label">Descrição:</label>

                  <div class="col-sm-10"><textarea style="resize:vertical" maxlength="255" name="descricao" class="form-control" value="">{{$equipamento->descricao}}</textarea></div>

                </div>
                <div class="form-group">

                  {!! Form::Label('categoria', 'Categoria:', array('class'=> 'col-sm-2 control-label')) !!}
                  <div class="col-sm-10">
                    {!! Form::select('idCategoria', $items3, $equipamento->idCategoria, ['class' => 'form-control m-b']) !!}
                  </div>
                </div>
                <!--necessario para nao falhar-->
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <a href="/equipamentos"><button class="btn btn-primary" type="button">Cancelar</button></a>
                    <button class="btn btn-primary" type="submit">Actualizar</button>
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
