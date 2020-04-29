<?php
namespace App\Http\Requests\usuario;
use Illuminate\Foundation\Http\FormRequest;
// Otros
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    $id_usuario = Crypt::decrypt($this->id_usuario);
    return [
      'nombre'                        => 'required|max:40|string',
      'apellidos'                     => 'required|max:40|string',
      'correo_de_acceso'              => 'required|max:75|email|unique:users,email,' . $id_usuario,
      'correo_secundario'             => 'nullable|max:75|email|different:correo_de_registro|different:correo_de_acceso',
      'rol'                           => 'required|exists:roles,id|array',
      'lada_telefono_fijo'            => 'nullable|max:9999|min:1|numeric|required_with:telefono_fijo',
      'telefono_fijo'                 => 'nullable|max:15|alpha_solo_numeros_guiones|required_with:lada_telefono_fijo',
      'extension'                     => 'max:10',
      'lada_telefono_movil'           => 'required|max:9999|min:1|numeric',
      'telefono_movil'                => 'required|max:15|alpha_solo_numeros_guiones',
      'empresa'                       => 'max:200',
      'observaciones'                 => 'nullable|max:65500|string',
      'notificaciones'                => 'in:on,off',
      'acceso_a_todos_los_registros'  => 'in:on,off',
      'imagen'                        => 'nullable|max:1024|image',
    ];
  }
  public function messages() {
    return [
      // Mensaje que se muestra en las diferentes validaciones, por ejemplo "required, max: min: ...".
      // 'nombre.required' => 'Debe especificar los :attribute',
    ];
  }
  public function attributes() {
    return [
    // Nombre del campo a mostrar.
      'nombre'  => 'nombre(s)',
    ];
  }
}