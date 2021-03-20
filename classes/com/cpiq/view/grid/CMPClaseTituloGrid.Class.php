<?php

/**
 * componente grilla para clases títulos.
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class CMPClaseTituloGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPClaseTituloFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new ClaseTituloGridModel() );
		//$this->setRenderer( );
	}

}