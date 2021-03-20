<?php

/**
 * componente grilla para entidades emisoras.
 *
 * @author Marcos
 * @since 06-06-2013
 *
 */
class CMPEntidadEmisoraGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPEntidadEmisoraFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new EntidadEmisoraGridModel() );
		//$this->setRenderer( );
	}

}