<?php

/**
 * componente grilla para provincias
 *
 * @author Marcos
 * @since 28-05-2013
 *
 */
class CMPProvinciaGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPProvinciaFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new ProvinciaGridModel() );
		//$this->setRenderer( );
	}

}