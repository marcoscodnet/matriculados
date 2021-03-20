<?php

/**
 * Formato para renderizar un detalle en las grillas
 *
 * @author Marcos
 * @since 01-11-2013
 *
 */
class GridMatriculaValueFormat extends GridValueFormat {

	public function __construct() {

		parent::__construct();
	}

	public function format($value, $item=null) {

		//$id= $item->getIdQueBuscas();
		
		
		 if( empty($value) )
                          $res = "";
                 else {
					$oCriteria = new CdtSearchCriteria();
					$oCriteria->addFilter('matriculado_oid', $value, '=');
					$oCriteria->addFilter("tituloPrincipal", 1, "=" );
					$managerTitulo =  ManagerFactory::getTituloManager();
					$oTitulo = $managerTitulo->getEntity($oCriteria);
					if ($oTitulo) {
						$res = $oTitulo->getTipoTitulo()->getSecuenciaTitulo()->getNombre().' '.$oTitulo->getMatricula();
					}
                 	else  $res = "";
                 }
		return $res ;
	}

}