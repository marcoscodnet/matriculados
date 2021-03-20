<?php

/**
 * componente grilla para localidades
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 27-05-2013
 *
 */
class CMPLocalidadGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPLocalidadFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new LocalidadGridModel() );
		//$this->setRenderer( );
	}

}