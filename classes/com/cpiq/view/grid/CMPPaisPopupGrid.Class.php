<?php

/**
 * componente grilla para paises
 * 
 * @author bernardo
 * @since 06/06/2013
 */
class CMPPaisPopupGrid extends CMPPaisGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}