<div class="float-right pr-5">
  @if(Request::route()->getName() != 'logistica.direccionLocal.show')
    @can('logistica.direccionLocal.createComprobanteDeSalida')
      <a href="{{ route('logistica.direccionLocal.show', Crypt::encrypt($direccion->id)) }}" class="btn btn-info btn-sm">{{ __('Detalles') }}</a>
    @endcan 
  @endif

  @if(Request::route()->getName() != 'logistica.direccionLocal.createComprobanteDeSalida')
    @can('logistica.direccionLocal.createComprobanteDeSalida')
      <a href="{{ route('logistica.direccionLocal.createComprobanteDeSalida', Crypt::encrypt($direccion->id)) }}" class="btn btn-info btn-sm">{{ __('Registrar comprobante de salida') }}</a>
    @endcan 
  @endif

  @if(Request::route()->getName() != 'logistica.direccionLocal.createComprobanteDeEntrega')
    @can('logistica.direccionLocal.createComprobanteDeSalida')
      <a href="{{ route('logistica.direccionLocal.createComprobanteDeEntrega', Crypt::encrypt($direccion->id)) }}" class="btn btn-info btn-sm">{{ __('Registrar comprobante de entrega') }}</a>
    @endcan
  @endif
</div>