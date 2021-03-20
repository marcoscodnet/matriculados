<?php

/**
 * Manager para TipoAsignado
 *  
 * @author Marcos
 * @since 25-07-2013
 */
class TipoAsignadoManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getTipoAsignadoDAO();
	}

}
?>
