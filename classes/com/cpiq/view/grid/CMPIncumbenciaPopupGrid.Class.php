<?php

/**
 * componente grilla para incumbencia
 *
 * @author Marcos
 * @since 22-03-2017
 *
 */
class CMPIncumbenciaPopupGrid extends CMPIncumbenciaGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}