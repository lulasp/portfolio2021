@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Fornecedores</div>

        <div class="panel-body">
          <h2> Editar Fornecedor {{$fornecedor->nome}}</h2>

          <div>

            <div class="ibox-content">
              <form method="POST" class="form-horizontal" action="/fornecedores/{{$fornecedor->id}}">
                {{method_field('PATCH')}}
                <div class="form-group"><label class="col-sm-2 control-label">Nome:</label>

                  <div class="col-sm-10"><input type="text" name="nome" class="form-control" value="{{$fornecedor->nome}}"></div>

                </div>
                <div class="form-group"><label class="col-sm-2 control-label">Email:</label>

                  <div class="col-sm-10"><input type="text" name="email" class="form-control" value="{{$fornecedor->email}}"></div>

                </div>
                <div class="form-group"><label class="col-sm-2 control-label">Telefone:</label>

                  <div class="col-sm-10"><input type="text" name="telefone" class="form-control" value="{{$fornecedor->telefone}}"></div>

                </div>
                <div class="form-group"><label class="col-sm-2 control-label">Fax:</label>

                  <div class="col-sm-10"><input type="text" name="fax" class="form-control" value="{{$fornecedor->fax}}"></div>

                </div>
                <!--necessario para nao falhar-->
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <a href="/fornecedores"><button class="btn btn-primary" type="button">Cancelar</button></a>
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
