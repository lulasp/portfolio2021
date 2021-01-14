@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Categorias</div>

        <div class="panel-body">
          <h1> Inserir Categoria </h1>

          <div>

            <hr>
            <h4>Inserir uma Categoria</h4>

            <div class="ibox-content">

              <form method="POST" class="form-horizontal" action="/categorias/store">

                <div class="form-group"><label class="col-sm-2 control-label">Categoria:</label>

                  <div class="col-sm-10"><input type="text" name="categoria" class="form-control"></div>

                </div>
                <!--necessario para nao falhar-->
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-2">
                    <a href="/categorias"><button class="btn btn-primary" type="button">Cancelar</button></a>
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
