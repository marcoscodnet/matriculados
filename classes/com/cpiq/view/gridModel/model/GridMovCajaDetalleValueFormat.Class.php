<?php

/**
 * Formato para renderizar un detalle en las grillas
 *
 * @author Marcos
 * @since 01-11-2013
 *
 */
class GridMovCajaDetalleValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		$res='';
		$observaciones = ($item->getObservaciones())?CPIQ_LBL_MOVCAJA_OBSERVACIONES.': '.$item->getObservaciones():'';
		$res = $observaciones;
		if ($item->getMovCtaCte()->getMatriculado()->getOid()) {
			$managerMatriculado =  ManagerFactory::getMatriculadoManager();
			$oMatriculado = $managerMatriculado->getObjectByCode($item->getMovCtaCte()->getMatriculado()->getOid());
			$managerTipoDocumento = new TipoDocumentoManager();
			$oTipoDocumento = $managerTipoDocumento->getObjectByCode($oMatriculado->getTipoDocumento()->getOid());
			
			$res = CPIQ_LBL_MATRICULADO.': '.$oMatriculado->getApellido().', '.$oMatriculado->getNombre().' '.$oTipoDocumento->getNombre().': '.$oMatriculado->getNroDocumento().' '.$observaciones;
			
		}
		
		if ($item->getAnulacion()->getOid()) {
			if (!$item->getObservaciones()) 		
			
				$res = CPIQ_LBL_MOVCAJA_ANULADO.' '.CDT_ENTITIES_LBL_ENTITY_OID.': '.$item->getOid();;
		}
		
		
		
		 
		return $res ;
	}

}