<?php

/**
 * Formato para renderizar un pagoEstado en las grillas
 *
 * @author Marcos
 * @since 24-10-2013
 *
 */
class GridPagoEstadoValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		//$id= $item->getIdQueBuscas();
		
		
		 if( empty($value) )
                          $res = CPIQ_MSG_CUOTA_GENERADA_IMPAGA;
                 else {
					$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
					$oMovCtaCte = $managerMovCtaCte->getObjectByCode($value);
					
                 	$res = ($oMovCtaCte->getAnulacion()->getOid())?CPIQ_MSG_CUOTA_GENERADA_IMPAGA:CPIQ_MSG_CUOTA_GENERADA_PAGA;
                 }
		return $res ;
	}

}