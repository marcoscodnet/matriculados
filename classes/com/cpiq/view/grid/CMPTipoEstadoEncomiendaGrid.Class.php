<?php

/**
 * componente grilla para tipos de estados de encomienda .
 *
 * @author marcos
 * @since 03-10-2013
 *
 */
class CMPTipoEstadoEncomiendaGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPTipoEstadoEncomiendaFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new TipoEstadoEncomiendaGridModel() );
		//$this->setRenderer( );
	}

}