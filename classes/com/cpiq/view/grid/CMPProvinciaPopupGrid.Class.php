<?php

/**
 * componente grilla para provincias
 * 
 * @author bernardo
 * @since 06/06/2013
 */
class CMPProvinciaPopupGrid extends CMPProvinciaGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
		//vemos si se definió el parent (la provincia).
		$pais_oid =  CdtUtils::getParam("parent", null );
		
		if( !empty($pais_oid) ){
			$pais = new Pais();
			$pais->setOid($pais_oid);
			$filter->setPais($pais);
		}
		
		//TODO habría que ver para el caso de que
		//el parent exista, de poder setearlo fijo,
		//que sea hidden y no pueda cambiarse.
		
		
	}

}