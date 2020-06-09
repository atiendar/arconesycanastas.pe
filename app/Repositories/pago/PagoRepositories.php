<?php
namespace App\Repositories\pago;
// Models
use App\Models\Pago;
// Events
use App\Events\layouts\ActividadRegistrada;
use App\Events\layouts\ArchivoCargado;
// Servicios
use App\Repositories\servicio\crypt\ServiceCrypt;
// Repositories
use App\Repositories\venta\pedidoActivo\PedidoActivoRepositories;
// Otros
use Illuminate\Support\Facades\Auth;
use DB;

class PagoRepositories implements PagoInterface {
  protected $serviceCrypt;
  protected $pedidoActivoRepo;
  public function __construct(ServiceCrypt $serviceCrypt, PedidoActivoRepositories $pedidoActivoRepositories) {
    $this->serviceCrypt = $serviceCrypt;
    $this->pedidoActivoRepo = $pedidoActivoRepositories;
  }
  public function getPagoFindOrFailById($id_pago, $relaciones) {
    $id_pago = $this->serviceCrypt->decrypt($id_pago);
    return Pago::with($relaciones)->findOrFail($id_pago);
  }// ->orderBy('estat_pag', 'ASC')
  public function getPagination($request) {
    return Pago::with('pedido')->buscar($request->opcion_buscador, $request->buscador)->orderByRaw('estat_pag ASC, id DESC')->paginate($request->paginador);
  }
  public function store($request, $id_pedido) {
    try { DB::beginTransaction();
      $pedido = $this->pedidoActivoRepo->getPedidoFindOrFail($id_pedido, []);
      $pago = new Pago();
      $pago->cod_fact       = $this->generateRandomString();
      $pago->form_de_pag    = $request->forma_de_pago;
      $pago->mont_de_pag    = $request->monto_del_pago;
      $pago->pedido_id      = $pedido->id;   
      $pago->user_id        = $pedido->user_id; 
      $pago->created_at_pag = Auth::user()->email_registro;

      if($request->hasfile('comprobante_de_pago')) {
        // Dispara el evento registrado en App\Providers\EventServiceProvider.php
        $imagen = ArchivoCargado::dispatch(
          $request->file('comprobante_de_pago'), // Archivo blob
          'public/venta/pedido/' . $pedido->serie . '/', // Ruta en la que guardara el archivo
          'pago-' . time() . '.', // Nombre del archivo
          null // Ruta y nombre del archivo anterior
        ); 
        $pago->comp_de_pag_rut  = $imagen[0]['ruta'];
        $pago->comp_de_pag_nom  = $imagen[0]['nombre'];
      }
      if($request->hasfile('copia_de_identificacion')) {
        // Dispara el evento registrado en App\Providers\EventServiceProvider.php
        $imagen = ArchivoCargado::dispatch(
          $request->file('copia_de_identificacion'), // Archivo blob
          'public/venta/pedido/' . $pedido->serie . '/', // Ruta en la que guardara el archivo
          'pago-' . time() . '.', // Nombre del archivo
          null // Ruta y nombre del archivo anterior
        ); 
        $pago->cop_de_indent_rut  = $imagen[0]['ruta'];
        $pago->cop_de_indent_nom  = $imagen[0]['nombre'];
      }
      $pago->save();
      $pago->cod_fact .= $pago->id;
      $pago->save();
      $this->pedidoActivoRepo->getEstatusPagoPedido($pedido);
      /*
      *
      * FALTA ENVIAR CORREO CON EL CODIGO DE FACTURA
      *
      */
      DB::commit();
      return $pago;
    } catch(\Exception $e) { DB::rollback(); throw $e; }
  }
  public function update($request, $id_pago) {
    try { DB::beginTransaction();
      $pago = $this->getPagoFindOrFailById($id_pago, ['pedido']);
      $pago->estat_pag  = $request->estatus_pago;
      $pago->coment_pag = $request->comentarios;
      
      if($pago->isDirty()) {
        // Dispara el evento registrado en App\Providers\EventServiceProvider.php
        ActividadRegistrada::dispatch(
          'Pagos (Individual)', // Módulo
          'pago.show', // Nombre de la ruta
          $id_pago, // Id del registro debe ir encriptado
          $this->serviceCrypt->decrypt($id_pago), // Id del registro a mostrar, este valor no debe sobrepasar los 100 caracteres
          array('Estatus pago', 'Comentarios'), // Nombre de los inputs del formulario
          $pago, // Request
          array('estat_pag', 'coment_pag') // Nombre de los campos en la BD
        ); 
        $pago->updated_at_pag  = Auth::user()->email_registro;
      }
      $pago->save();
      $this->pedidoActivoRepo->getEstatusPagoPedido($pago->pedido);

      /*
      *
      * FALTA ENVIAR CORREO CON EL CODIGO DE FACTURA
      *
      */

      DB::commit();
      return $pago;
    } catch(\Exception $e) { DB::rollback(); throw $e; }
  }
  public function destroy($id_pago) {
    dd('destroy');
  }
  public function generateRandomString($length = 4) { 
    return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
  } 
}