<?php

/**
 * componente grilla para concepto
 *
 * @author Marcos
 * @since 01-11-2013
 *
 */
class CMPConceptoPopupGrid extends CMPConceptoGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}