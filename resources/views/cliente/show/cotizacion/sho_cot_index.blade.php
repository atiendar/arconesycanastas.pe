@extends('layouts.private.escritorio.dashboard')
@section('titulo')
<div class="col-sm-6">
  <h1 class="m-0 text-dark"> {{ $cliente->nom.' '.$cliente->apell }}</h1>
</div>
@endsection
@section('contenido')
<title>@section('title', __('Lista de cotizaciones').' | '.$cliente->nom)</title>
@include('cliente.show.cli_sho_menu')
<div class="card {{ config('app.color_card_primario') }} card-outline card-tabs position-relative bg-white">
  <div class="card-body">
    {!! Form::model(Request::all(), ['route' => ['cliente.show.cotizacion.index', Crypt::encrypt($cliente->id)], 'method' => 'GET']) !!}
      @include('global.buscador.buscador', ['ruta_recarga' => route('cliente.show.cotizacion.index', Crypt::encrypt($cliente->id)), 'opciones_buscador' => config('opcionesSelect.select_cliente_cotizacion_index')])
    {!! Form::close() !!}
    @include('cliente.show.cotizacion.sho_cot_table')
    @include('global.paginador.paginador', ['paginar' => $cotizaciones])  
  </div>
</div>
@endsection