<?php
namespace App\Http\Requests\armado;
use Illuminate\Foundation\Http\FormRequest;

class StoreArmadoRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'tipo'                => 'required|max:150|exists:catalogos,value',
      'nombre'              => 'required|max:60|unique:armados,nom',
      'sku'                 => 'required|max:30|unique:armados,sku',
      'gama'                => 'required|max:150|exists:catalogos,value',
      'destacado'           => 'required|in:Si,No',
      'imagen_del_armado'   => 'nullable|max:1024|image',
      'url_pagina'          => 'max:150',
      'observaciones'       => 'nullable|max:30000|string',
    ];
  }
}