<div class="row">
  <div class="form-group col-sm btn-sm">
    <label for="created_at">{{ __('Fecha de registro') }}</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
      </div>
        {!! Form::text('created_at', $pedido->created_at, ['class' => 'form-control disabled', 'maxlength' => 0, 'placeholder' => __('Fecha de registro'), 'readonly' => 'readonly']) !!}
    </div>
  </div>
  <div class="form-group col-sm btn-sm">
    <label for="created_at_ped">{{ __('Registrado por') }}</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
      </div>
      {!! Form::text('created_at_ped', $pedido->created_at_ped, ['class' => 'form-control disabled', 'maxlength' => 0, 'placeholder' => __('Registrado por'), 'readonly' => 'readonly']) !!}
    </div>
  </div>
</div>
<div class="row">
  <div class="form-group col-sm btn-sm">
    <label for="updated_at">{{ __('Fecha última modificación') }}</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
      </div>
        {!! Form::text('updated_at', $pedido->updated_at, ['class' => 'form-control disabled', 'maxlength' => 0, 'placeholder' => __('Fecha última modificación'), 'readonly' => 'readonly']) !!}
    </div>
  </div>
  <div class="form-group col-sm btn-sm">
    <label for="updated_at_ped">{{ __('Última modificación por') }}</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
      </div>
      {!! Form::text('updated_at_ped', $pedido->updated_at_ped, ['class' => 'form-control disabled', 'maxlength' => 0, 'placeholder' => __('Última modificación por'), 'readonly' => 'readonly']) !!}
    </div>
  </div>
</div>