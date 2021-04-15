@extends('layout')
@section('content')
  <!-- MAIN CONTENT-->
    <div class="container">
      <br><br>
      <a href="{{action('MainController@evaluation')}}" class="btn btn-danger float-right">Salir</a>
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
        <div class="" style="margin-top: 1rem;">
          <form class="float-left" action="{{action('CustomerController@authorizeCustomer',$customer->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            <button class="btn btn-primary" type="submit" onclick="return confirm('¿Haz revisado todos los documentos?')">Autorizar</button>
          </form>

          <!-- Button trigger modal -->
          <button type="button" class="float-left btn btn-danger" data-toggle="modal" data-target="#ModalCenter" style="margin-left:1rem;">
            Rechazar
          </button>
        </div>
			</div>
    </div>
  <!-- END MAIN CONTENT-->


  <!-- Modal -->
  <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form class="" action="{{action('CustomerController@update',$customer->id)}}" method="POST">
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLongTitle">Observaciones de rechazo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <textarea name="observations" rows="8" cols="80" style="size: 100%;" class="form-control" required placeholder="Escribe aquí las observaciones"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" onclick="return confirm('¿Haz revisado todos los documentos?')">Continuar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Modal -->
@stop
