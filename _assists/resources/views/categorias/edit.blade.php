@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Categorias</div>

        <div class="panel-body">
          <h2> Editar Categoria {{$categoria->categoria}}</h2>

          <div>


            <div class="ibox-content">
              <form method="POST" class="form-horizontal" action="/categorias/{{$categoria->id}}">
                {{method_field('PATCH')}}
                <div class="form-group"><label class="col-sm-2 control-label">Categoria:</label>

                  <div class="col-sm-10"><input type="text" name="categoria" class="form-control" value="{{$categoria->categoria}}"></div>

                </div>
                <!--necessario para nao falhar-->
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <a href="/categorias"><button class="btn btn-primary" type="button">Cancelar</button></a>
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
