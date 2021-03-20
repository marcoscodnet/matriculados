<?php

/**
 * componente grilla para cuotas
 *
 * @author Marcos
 * @since 27-06-2013
 *
 */
class CMPCuotaGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$this->setFilter( new CMPCuotaFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new CuotaGridModel() );
		//$this->setRenderer( );
	}

}