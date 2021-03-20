<?php

/**
 * componente grilla para encomiendas
 *
 * @author Marcos
 * @since 03-10-2013
 *
 */
class CMPEncomiendaGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPEncomiendaFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new EncomiendaGridModel() );
		//$this->setRenderer( );
	}

}