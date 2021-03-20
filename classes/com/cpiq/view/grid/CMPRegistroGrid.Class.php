<?php

/**
 * componente grilla para registros
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class CMPRegistroGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$this->setFilter( new CMPRegistroFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new RegistroGridModel() );
		//$this->setRenderer( );
	}

}