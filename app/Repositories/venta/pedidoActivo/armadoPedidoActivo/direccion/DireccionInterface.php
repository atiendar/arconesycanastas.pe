<?php
namespace App\Repositories\venta\pedidoActivo\armadoPedidoActivo\direccion;

interface DireccionInterface {
  public function direccionFindOrFailById($id_direccion, $relaciones);

  public function update($request, $id_direccion);
}