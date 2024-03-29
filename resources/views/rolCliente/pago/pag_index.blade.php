@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>@section('title', __('Lista de pagos'))</title>
<div class="card">
  <div class="card-header p-1">
    <ul class="nav nav-pills">
      @include('rolCliente.pago.pag_menu')
    </ul>
  </div>
  <div class="card-body">
    {!! Form::model(Request::all(), ['route' => 'rolCliente.pago.index', 'method' => 'GET']) !!}
      @include('global.buscador.buscador', ['ruta_recarga' => route('rolCliente.pago.index'), 'opciones_buscador' => config('opcionesSelect.select_pagos_rol_cliente_index')])
    {!! Form::close() !!}
    @include('rolCliente.pago.pag_table')
    @include('global.paginador.paginador', ['paginar' => $pagos])
  </div>
</div>
@endsection