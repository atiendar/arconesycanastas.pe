@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>@section('title', __('Registrar direccion'))</title>
<div class="card">
  <div class="card-header p-1">
    <ul class="nav nav-pills">
      @include('rolCliente.direccion.dir_menu')
    </ul>
  </div>
  <div class="card-body">
    {!! Form::open(['route' => 'rolCliente.direccion.store', 'onsubmit' => 'return checarBotonSubmit("btnsubmit")']) !!}
      @include('rolCliente.direccion.dir_createFields')
      <div class="row">
        <div class="form-group col-sm btn-sm">
          <a href="{{ route('rolCliente.direccion.index') }}" class="btn btn-default w-50 p-2 border"><i class="fas fa-sign-out-alt text-dark"></i> {{ __('Regresar') }}</a>
        </div>
        <div class="form-group col-sm btn-sm">
          <button type="submit" id="btnsubmit" class="btn btn-info w-100 p-2"><i class="fas fa-check-circle text-dark"></i> {{ __('Registrar') }}</button>
        </div>
      </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection