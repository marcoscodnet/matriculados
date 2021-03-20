<?php

/**
 * componente grilla para registro cuota
 * 
 * @author Marcos
 * @since 19/09/2013
 */
class CMPRegistroCuotaPopupGrid extends CMPRegistroCuotaGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
		//vemos si se definió el parent (la provincia).
		$pais_oid =  CdtUtils::getParam("parent", null );
		
		
		
		
	}

}