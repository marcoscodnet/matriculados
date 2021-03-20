<?php

/**
 * componente grilla para tipos de título.
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 17-05-2013
 *
 */
class CMPTipoTituloGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPTipoTituloFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new TipoTituloGridModel() );
		//$this->setRenderer( );
	}

}