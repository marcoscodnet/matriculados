<?php

/**
 * componente grilla para incumbencias
 *
 * @author Marcos
 * @since 26-09-2013
 *
 */
class CMPIncumbenciaGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$this->setFilter( new CMPIncumbenciaFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new IncumbenciaGridModel() );
		//$this->setRenderer( );
	}

}