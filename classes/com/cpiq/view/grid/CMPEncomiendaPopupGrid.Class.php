<?php

/**
 * componente grilla para encomienda
 *
 * @author Marcos
 * @since 19-10-2013
 *
 */
class CMPEncomiendaPopupGrid extends CMPEncomiendaGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}