@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>@section('title', __('Detalles pedido').' '.$pedido->num_pedido)</title>
<div class="card {{ config('app.color_card_primario') }} card-outline card-tabs position-relative bg-white">
  <div class="card-header p-1 border-botton {{ config('app.color_bg_primario') }}">
    <div class="float-right mr-5">
      @include('venta.pedido.pedido_activo.ven_pedAct_showFields.estatusVentasHeader')
    </div>
    <h5>
      <strong>{{ __('Datos generales, estas en el pedido') }}:</strong> {{ $pedido->num_pedido }}
      @include('venta.pedido.pedido_activo.ven_pedAct_showFields.entr_xprs_urg_foraneo_gratis')
    </h5>
  </div>
  <div class="ribbon-wrapper">
    <div class="ribbon {{ config('app.color_bg_primario') }}">
      <small>{{ $pedido->num_pedido }}</small>
    </div>
  </div>
  @can('venta.pedidoActivo.show')
    <div class="card-body">
      @include('venta.pedido.pedido_activo.ven_pedAct_showFields')
    </div>
  @endcan
</div>
@include('venta.pedido.pedido_terminado.armado.arm_index')
{{-- 
@include('venta.pedido.pedido_activo.pago_pedidoActivo.ven_pedAct_pag_index')
--}}
@endsection