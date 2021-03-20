<?php

/**
 * componente grilla para títulos
 *
 * @author Marcos
 * @since 12-06-2013
 *
 */
class CMPTituloGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$filter = new CMPTituloFilter();
		
		$matriculado_oid = CdtUtils::getParam('id');
			
		if (!empty( $matriculado_oid )) {
			$matriculado = new Matriculado();
			$matriculado->setOid($matriculado_oid);
			$filter->setMatriculado( $matriculado );
			$filter->saveProperties();
		}
		$this->setFilter( $filter );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new TituloGridModel() );
		//$this->setRenderer( );
	}

}