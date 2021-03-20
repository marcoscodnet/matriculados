<?php

/**
 * componente grilla para secuencia título
 *
 * @author Marcos
 * @since 10-06-2013
 *
 */
class CMPClaseTituloPopupGrid extends CMPClaseTituloGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}