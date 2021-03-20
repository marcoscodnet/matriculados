<?php

/**
 * componente grilla para movimeintos de caja
 *
 * @author Marcos
 * @since 01-11-2013
 *
 */
class CMPMovCajaGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
			
		$this->setFilter( new CMPMovCajaFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new MovCajaGridModel() );
		//$this->setRenderer( );
	}

}