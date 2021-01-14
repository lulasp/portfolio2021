@extends('layouts.app')

@section('content')
<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Categorias</div>

        <div class="panel-body">

          <!--TABLE-->

          <div class="row">
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Categorias</h5>
                </div>
                <div class="ibox-content">
                  <div class="">
                    <a href="/categorias/create" class="btn btn-primary">Adicionar Categoria  <i class="fa fa-plus"></i></a>
                  </div>
                  <hr>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">Categoria</th>
                          <th class="text-center">Editar</th>
                          <th class="text-center">Apagar</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                          <td width="70%"><a href="/categorias/{{$categoria->id}}">{{$categoria->categoria}}</a></td>
                          <td width="15%"><a href="/categorias/{{$categoria->id}}/edit"><i class="fa fa-edit text-navy"></i></a></td>
                          <td width="15%"><a href="/categorias/{{$categoria->id}}/destroy" onclick="return confirm('Apagar a categoria {{$categoria->categoria}} ?');"><i class="fa fa-trash text-navy"></i></a></td>

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
    </div>
  </div>
</div>



@stop
