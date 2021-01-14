@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Utilizadores</div>

        <div class="panel-body">
          <h2> Editar Utilizador {{$user->name}}</h2>

          <div>


            <div class="ibox-content">
              <form method="POST" class="form-horizontal" action="/users/{{$user->id}}">
                {{method_field('PATCH')}}
                <div class="form-group"><label class="col-sm-2 control-label">Nome:</label>

                  <div class="col-sm-10"><input type="text" name="nome" class="form-control" value="{{$user->name}}"></div>

                </div>
                <div class="form-group"><label class="col-sm-2 control-label">Email:</label>

                  <div class="col-sm-10"><input type="email" name="email" class="form-control" value="{{$user->email}}"></div>

                </div>

                <div class="form-group"><label class="col-sm-2 control-label">Password:</label>

                  <div class="col-sm-10"><input type="password" name="password" class="form-control" value="{{$user->password}}"></div>

                </div>
                <!--necessario para nao falhar-->
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <a href="/users"><button class="btn btn-primary" type="button">Cancelar</button></a>
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
