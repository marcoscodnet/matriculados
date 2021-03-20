<?php

/**
 * componente grilla para entidad emisora
 *
 * @author Marcos
 * @since 13-06-2013
 *
 */
class CMPEntidadEmisoraPopupGrid extends CMPEntidadEmisoraGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
	}

}