<?php

/**
 * componente grilla para tipo título
 *
 * @author Marcos
 * @since 13-06-2013
 *
 */
class CMPTipoTituloPopupGrid extends CMPTipoTituloGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}