<?php
namespace App\Http\Requests\pago\fPedido;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Pago;
use Illuminate\Support\Facades\Crypt;

class UpdatePagoRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    $id_pago = Crypt::decrypt($this->id_pago);
    $pago = Pago::with('pedido')->findOrFail($id_pago);
    $sum_mont_de_pag = Pago::where('pedido_id', $pago->pedido_id)->sum('mont_de_pag');
    $sum_mont_de_pag = ($sum_mont_de_pag - $pago->mont_de_pag);
    $max_monto = $pago->pedido->mont_tot_de_ped - $sum_mont_de_pag;

    return [
      'estatus_pago'            => 'required|in:Pendiente',
      'comprobante_de_pago'     => 'nullable|mimes:pdf,jpg,jpeg,png|max:1024',
      'forma_de_pago'           => 'required|in:Cheque,Efectivo,Paypal,Tarjeta de credito (Pagina),Tarjeta de credito (Clip),Transferencia,Otro',
      'copia_de_identificacion' => 'nullable|required_if:forma_de_pago,Paypal,Tarjeta de credito (Pagina)|mimes:pdf,jpg,jpeg,png|max:1024',
      'monto_del_pago'          => 'required|numeric|min:0|max:'.$max_monto.'|alpha_decimal15',
    ];
  }
}