<?php

/**
 * Manager para EntidadEmisora
 *  
 * @author Marcos
 * @since 06-06-2013
 */
class EntidadEmisoraManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getEntidadEmisoraDAO();
	}

}
?>
