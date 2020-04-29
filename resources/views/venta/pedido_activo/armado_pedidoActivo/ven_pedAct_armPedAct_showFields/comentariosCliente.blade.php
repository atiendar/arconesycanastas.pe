<div class="form-group col-sm btn-sm">
  <label for="comentarios_cliente">{{ __('Comentarios cliente') }}</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="fas fa-text-width"></i></span>
    </div>
    {!! Form::textarea('comentarios_cliente', $armado->coment_client, ['class' => 'form-control disabled', 'maxlength' => 0, 'placeholder' => __('Comentarios cliente'), 'rows' => 4, 'cols' => 4, 'readonly' => 'readonly']) !!}
  </div>
</div>