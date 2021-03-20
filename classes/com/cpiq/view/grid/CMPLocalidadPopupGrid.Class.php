<?php

/**
 * componente grilla para localidades
 *
 * @author Bernardo Iribarne (bernardo.iribarne@codnet.com.ar)
 * @since 27-05-2013
 *
 */
class CMPLocalidadPopupGrid extends CMPLocalidadGrid{

	public function __construct(){

		parent::__construct();

		$this->setRenderer( new FindEntityPopupRenderer() );
		
		//vemos si viene la provincia por parámetro
		$filter = $this->getFilter();
		$filter->setComponent( get_class($this) );
		
		//vemos si se definió el parent (la provincia).
		$provincia_oid =  CdtUtils::getParam("parent", null );
		
		if( !empty($provincia_oid) ){
			$provincia = new Provincia();
			$provincia->setOid($provincia_oid);
			$filter->setProvincia($provincia);
		}
		
		//TODO habría que ver para el caso de que
		//el parent exista, de poder setearlo fijo,
		//que sea hidden y no pueda cambiarse.
	}

}