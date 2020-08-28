@include('venta.pedido.pedido_activo.ven_pedAct_showFields.created')
<div class="row">
  @include('venta.pedido.pedido_activo.ven_pedAct_showFields.fechaDeEntrega')
  @include('venta.pedido.pedido_activo.ven_pedAct_showFields.sePuedeEntregarAntes')
  @include('venta.pedido.pedido_activo.ven_pedAct_showFields.cuantosDiasAntes')
</div>
<div class="row">
  @include('venta.pedido.pedido_activo.ven_pedAct_showFields.estatusProduccionCliente')
</div>
<div class="row">
  @include('venta.pedido.pedido_activo.ven_pedAct_showFields.comentariosCliente')
</div>
<div class="row">
  <div class="form-group col-sm btn-sm">
    <center><a href="{{ route('rolCliente.pedido.index') }}" class="btn btn-default w-50 p-2 border"><i class="fas fa-sign-out-alt text-dark"></i> {{ __('Regresar') }}</a></center>
  </div>
</div>
@include('layouts.private.plugins.priv_plu_select2')
@section('js2')
<script>
  $('.select2').prop("disabled", true);
</script>
@endsection