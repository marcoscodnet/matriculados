<?php

/**
 * Manager para Provincia
 *  
 * @author Marcos
 * @since 28-05-2013
 */
class ProvinciaManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getProvinciaDAO();
	}

	/**
	 * (non-PHPdoc)
	 * @see interfaces/IObjectFinder::getObjectByCode()
	 */
	function getObjectByCode( $text, $parent=null ){
		
		$criteria = new CdtSearchCriteria();
		$criteria->addFilter("oid", $text, "=" );
		
		if($parent!=null){
			$criteria->addFilter("pais_oid", $parent, "=" );
		}
		
		return $this->getDAO()->getEntity($criteria);	
	}
	
}
?>
