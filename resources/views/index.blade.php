@extends('layout')
@section('content')
<!-- MAIN CONTENT-->
<div class="flex-center position-ref full-height">
  <div class="content">
    <div class="title m-b-md text-center">
      Menú
    </div>
    <div class="links">
      <a href="{{ action('CustomerController@create') }}">Captura</a>
      <a href="{{ action('MainController@list') }}">Listado</a>
      <a href="{{ action('MainController@evaluation') }}">Evaluación</a>
    </div>
  </div>
</div>
<!-- END MAIN CONTENT-->
@stop
