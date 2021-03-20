<?php

/**
 * componente grilla para tiposEncomienda
 *
 * @author Marcos
 * @since 27-09-2013
 *
 */
class CMPTipoEncomiendaGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$this->setFilter( new CMPTipoEncomiendaFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new TipoEncomiendaGridModel() );
		//$this->setRenderer( );
	}

}