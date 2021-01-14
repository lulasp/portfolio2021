@extends('layouts.app')

@section('content')
<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Fastluza Equipment - Status</div>

        <div class="panel-body">

          <!--TABLE-->

          <div class="row">
            <div class="col-lg-12">
              <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Status</h5>

                </div>
                <div class="ibox-content">

                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">Status</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($statuses as $status)
                      <tr>
                        <td><a href="/statuses/{{$status->id}}">{{$status->pat_status}}</a></td>
                
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



@stop
