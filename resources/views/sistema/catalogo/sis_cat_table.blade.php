<div class="card-body table-responsive p-0" id="div-tabla-scrollbar" style="height: 40em;">
  <table class="table table-head-fixed table-hover table-striped table-sm table-bordered">
    @if(sizeof($catalogos) == 0)
      @include('layouts.private.busquedaSinResultados')
    @else 
      <thead>
        <tr>
          <th>{{ __('ID') }}</th>
          <th>{{ __('INPUT') }}</th>
          <th>{{ __('VISTA') }}</th>
          <th colspan="2">&nbsp</th>
        </tr>
      </thead>
      <tbody> 
        @foreach($catalogos as $catalogo)
          <tr title={{ $catalogo->id }}>
            <td width="1rem">{{ $catalogo->id }}</td>
            <td>{{ $catalogo->input }}</td>
            <td title="Detalles: {{ $catalogo->id }}">
              @can('sistema.catalogo.show')
                <a href="{{ route('sistema.catalogo.show', Crypt::encrypt($catalogo->id)) }}">{{ $catalogo->vista }}</a>
              @else
                {{ $catalogo->vista }}
              @endcan
            </td>
            @include('sistema.catalogo.sis_cat_tableOpciones') 
          </tr>
          @endforeach
      </tbody>
    @endif
  </table>
</div>