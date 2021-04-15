@extends('layout')
@section('content')
  <!-- MAIN CONTENT-->
    <div class="container">
      <br><br>
      <a href="{{action('MainController@index')}}" class="btn btn-danger float-right" onclick="return confirm('Si continuas los datos capturados no se guardaran. ¿Deseas continuar?')">Salir</a>
      <br><br>
      <div class="card" style="padding: 1rem;">
        <form class="form" action="{{action('CustomerController@store')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label>Nombre*</label>
                <input class="form-control" tylabele="text" name="name" value="" required>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Apellido paterno*</label>
                <input class="form-control" tylabele="text" name="last_name" value="" required>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Apellido Materno</label>
                <input class="form-control" tylabele="text" name="mother_last_name" value="">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label>Calle*</label>
                <input class="form-control" tylabele="text" name="street" value="" required>
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label>Número*</label>
                <input class="form-control" tylabele="text" name="number" value="" required>
              </div>
            </div>
            <div class="col-7">
              <div class="form-group">
                <label>Colonia*</label>
                <input class="form-control" tylabele="text" name="suburb" value="" required>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Código postal*</label>
                <input class="form-control" tylabele="text" name="zip" value="" required>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>Teléfono*</label>
                <input class="form-control" tylabele="text" name="phone" value="" required>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label>RFC*</label>
                <input class="form-control" tylabele="text" name="rfc" value="" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Documentos*</label> <button type="button" name="button" class="btn btn-info" id="file-button" style="margin-bottom: 5px;"><i class="fa fw fa-plus"></i></button>
            <div id="content-files">
              <div class="row">
                <div class="col-5">
                  <input type="file" name="file[]" value="" required>
                </div>
                <div class="col-5">
                  <div class="form-group">
                    <label>Nombre del archivo*</label>
                    <input class="form-control" type="text" name="file_alias[]" value="" required>
                  </div>
                </div>
                <div class="col-2">
                  <a href="#" class="btn btn-danger btn-sm remove"><i class="fa fw fa-trash"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" name="button" class="btn btn-success">ENVIAR</button>
          </div>
        </form>
      </div>
    </div>
  <!-- END MAIN CONTENT-->

@stop
