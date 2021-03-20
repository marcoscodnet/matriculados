<?php

/**
 * componente grilla para tipo encomienda
 *
 * @author Marcos
 * @since 04-10-2013
 *
 */
class CMPTipoEncomiendaPopupGrid extends CMPTipoEncomiendaGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}