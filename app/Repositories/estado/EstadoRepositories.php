<?php
namespace App\Repositories\estado;
// Models
use App\Models\Estado;
// Servicios
use App\Repositories\servicio\crypt\ServiceCrypt;

class EstadoRepositories implements EstadoInterface {
  protected $serviceCrypt;
  public function __construct(ServiceCrypt $serviceCrypt) {
    $this->serviceCrypt = $serviceCrypt;
  }
  public function getAllEstadosPluck($foraneo_o_local) {
    return Estado::where('for_loc', $foraneo_o_local)->orwhere('for_loc', 'Foráneo y Local')->orderBy('est', 'ASC')->pluck('est');
  }
}