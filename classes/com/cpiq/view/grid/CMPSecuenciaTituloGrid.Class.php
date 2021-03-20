<?php

/**
 * componente grilla para secuencias títulos.
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class CMPSecuenciaTituloGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPSecuenciaTituloFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new SecuenciaTituloGridModel() );
		//$this->setRenderer( );
	}

}