<?php

/**
 * componente grilla para estados.
 *
 * @author Marcos
 * @since 07-06-2013
 *
 */
class CMPEstadoMatriculadoGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPEstadoMatriculadoFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new EstadoMatriculadoGridModel() );
		//$this->setRenderer( );
	}

}