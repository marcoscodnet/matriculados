<?php

/**
 * componente grilla para conceptos
 *
 * @author Marcos
 * @since 25-07-2013
 *
 */
class CMPConceptoGrid extends CMPEntityGrid{

	public function __construct(){

		parent::__construct();
		
		$this->setFilter( new CMPConceptoFilter() );
		$this->setLayout( new CdtLayoutBasicAjax() );
		$this->setModel( new ConceptoGridModel() );
		//$this->setRenderer( );
	}

}