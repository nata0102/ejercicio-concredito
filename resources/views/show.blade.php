@extends('layout')
@section('content')
  <!-- MAIN CONTENT-->
    <div class="container">
      <br><br>
      <a href="{{action('MainController@list')}}" class="btn btn-danger float-right">Regresar</a>
      <br><br>
      <div class="card" style="padding: 1rem;">
        <b>Nombre: </b><p>{{$customer->name}}</p>
        <b>Primer Apellido: </b><p>{{$customer->last_name}}</p>
        <b>Segundo Apellido: </b><p>{{$customer->mother_last_name}}</p>
        <b>Calle: </b><p>{{$customer->street}}</p>
        <b>Número: </b><p>{{$customer->number}}</p>
        <b>Colonia: </b><p>{{$customer->suburb}}</p>
        <b>Código postal: </b><p>{{$customer->zip}}</p>
        <b>Teléfono: </b><p>{{$customer->phone}}</p>
        <b>RFC: </b><p>{{$customer->rfc}}</p>
        <b>Archivos</b>
        <div class="card table-responsive table-striped">
          <table style="width: 100%; table-layout: fixed;">
            <thead>
              <tr>
                <th style="width:15px;">#</th>
                <th style="width:100px;">Nombre</th>
                <th style="width:50px;"></th>
              </tr>
            </thead>
            <tbody>
              <?php $w = 1; ?>
              @foreach($customer->files as $file)
              <tr>
                <td>{{$w}}</td>
                <td>{{ $file->alias }}</td>
                <td><button data-url="{{asset('documents')}}/{{ $file->name }}" data-name="{{ $file->alias }}" class="file btn btn-info">Ver</button></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @if($customer->status == "Rechazado")
          <p>Observaciones del rechazo</p>
          <pre>{{$customer->observations}}</pre>
        @endif
      </div>
    </div>
  <!-- END MAIN CONTENT-->
@stop
