<?php

/**
 * componente grilla para registro
 *
 * @author Marcos
 * @since 04-07-2013
 *
 */
class CMPRegistroPopupGrid extends CMPRegistroGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}