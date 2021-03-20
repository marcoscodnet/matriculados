<?php

/**
 * componente grilla para observaciones de la encomienda.
 *
 * @author Marcos
 * @since 10-10-2013
 *
 */
class CMPEncomiendaObservacionGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPEncomiendaObservacionFilter();
		
		$encomienda_oid = CdtUtils::getParam('id');
			
		if (!empty( $encomienda_oid )) {
			$encomienda = new Encomienda();
			$encomienda->setOid($encomienda_oid);
			$filter->setEncomienda( $encomienda );
			$filter->saveProperties();
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new EncomiendaObservacionGridModel() );
		//$this->setRenderer( );
	}

}