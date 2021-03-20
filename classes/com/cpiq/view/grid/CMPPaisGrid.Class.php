<?php

/**
 * componente grilla para paises
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class CMPPaisGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPPaisFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new PaisGridModel() );
		//$this->setRenderer( );
	}

}