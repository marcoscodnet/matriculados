<?php

/**
 * componente grilla para tipos de documento.
 *
 * @author marcos
 * @since 30-05-2013
 *
 */
class CMPTipoDocumentoGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();

		$this->setFilter( new CMPTipoDocumentoFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new TipoDocumentoGridModel() );
		//$this->setRenderer( );
	}

}