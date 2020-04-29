<div class="form-group col-sm btn-sm">
  <label for="comentarios_ventas">{{ __('Comentarios ventas') }}</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="fas fa-text-width"></i></span>
    </div>
    {!! Form::textarea('comentarios_ventas', $armado->coment_vent, ['class' => 'form-control disabled', 'maxlength' => 0, 'placeholder' => __('Comentarios ventas'), 'rows' => 4, 'cols' => 4, 'readonly' => 'readonly']) !!}
  </div>
</div>