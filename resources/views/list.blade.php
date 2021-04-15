@extends('layout')
@section('content')
  <!-- MAIN CONTENT-->
    <div class="container">
      <div class="">
        <br><br>
        <a href="{{action('MainController@index')}}" class="btn btn-danger float-right">Salir</a>
        <br><br>
        <div>
  				<div class="card" style="padding: 1rem;">
  					<h3 class="text-center">Listado de prospectos</h3>
            <div class="card table-responsive table-striped">
              <table id="DT" style="width: 100%; table-layout: fixed;">
  							<thead>
  								<tr>
                    <th style="width:20px;">#</th>
                    <th style="width:100px;">Nombre</th>
  									<th style="width:100px;">Primer Apellido</th>
  									<th style="width:100px;">Segundo Apellido</th>
  									<th style="width:50px;">Estado</th>
                    <th style="width:50px;"></th>
  								</tr>
  							</thead>
  							<tbody>
                  <?php $w = 1; ?>
  								@foreach($customers as $customer)
  								<tr>
                    <td>{{$w}}</td>
  									<td>{{ $customer->name }}</td>
  									<td>{{ $customer->last_name }}</td>
  									<td>{{ $customer->mother_last_name }}</td>
                    <td>{{ $customer->status }}</td>
                    <td><a href="{{action('CustomerController@show',$customer->id)}}" class="btn btn-info">Ver</a></td>
  								</tr>
  								@endforeach
  							</tbody>
  						</table>
  					</div>
  				</div>

  			</div>
      </div>
    </div>
  <!-- END MAIN CONTENT-->
@stop
