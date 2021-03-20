<?php

/**
 * Manager para Localidad
 *  
 * @author Bernardo
 * @since 23-05-2013
 */
class LocalidadManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getLocalidadDAO();
	}

	/**
	 * (non-PHPdoc)
	 * @see interfaces/IObjectFinder::getObjectByCode()
	 */
	function getObjectByCode( $text, $parent=null ){
		
		$criteria = new CdtSearchCriteria();
		$criteria->addFilter("oid", $text, "=" );
		
		if($parent!=null){
			$criteria->addFilter("provincia_oid", $parent, "=" );
		}
		
		return $this->getDAO()->getEntity($criteria);	
	}
	
}
?>
