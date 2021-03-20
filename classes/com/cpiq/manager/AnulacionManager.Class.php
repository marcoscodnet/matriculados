<?php

/**
 * Manager para Anulacion
 *  
 * @author Marcos
 * @since 01-11-2013
 */
class AnulacionManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getAnulacionDAO();
	}

}
?>
