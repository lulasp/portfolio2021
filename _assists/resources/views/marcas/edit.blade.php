@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Marcas</div>

        <div class="panel-body">
          <h2> Editar {{$marca->marca}}</h2>

          <div>


            <div class="ibox-content">
              <form method="POST" class="form-horizontal" action="/marcas/{{$marca->id}}">
                {{method_field('PATCH')}}
                <div class="form-group"><label class="col-sm-2 control-label">Marca:</label>

                  <div class="col-sm-10"><input type="text" name="marca" class="form-control" value="{{$marca->marca}}"></div>

                </div>
                <!--necessario para nao falhar-->
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <a href="/marcas"><button class="btn btn-primary" type="button">Cancelar</button></a>
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
