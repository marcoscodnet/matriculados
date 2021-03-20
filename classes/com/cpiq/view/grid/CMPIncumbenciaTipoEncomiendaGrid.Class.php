<?php

/**
 * componente grilla para incumbencias tiposEncomienda.
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class CMPIncumbenciaTipoEncomiendaGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPIncumbenciaTipoEncomiendaFilter();
		
		$tipoEncomienda_oid = CdtUtils::getParam('id');
			
		if (!empty( $tipoEncomienda_oid )) {
			$tipoEncomienda = new TipoEncomienda();
			$tipoEncomienda->setOid($tipoEncomienda_oid);
			$filter->setTipoEncomienda( $tipoEncomienda );
			$filter->saveProperties();
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new IncumbenciaTipoEncomiendaGridModel() );
		//$this->setRenderer( );
	}

}